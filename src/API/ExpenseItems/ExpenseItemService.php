<?php

namespace Anteris\Autotask\API\ExpenseItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ExpenseItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ExpenseItemsEntity.htm Autotask documentation.
 */
class ExpenseItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;
    /**
     * Instantiates the class.
     *
     * @param  HttpClient  $client  The http client that will be used to interact with the API.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new expenseitem.
     *
     * @param  ExpenseItemEntity  $resource  The expenseitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ExpenseItemEntity $resource): Response
    {
        $expenseReportID = $resource->expenseReportID;
        return $this->client->post("Expenses/$expenseReportID/Items", $resource->toArray());
    }

    /**
     * Finds the ExpenseItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ExpenseItemEntity
    {
        return ExpenseItemEntity::fromResponse(
            $this->client->get("ExpenseItems/$id")
        );
    }

    /**
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ExpenseItems/entityInformation/fields")
        );
    }

    /**
     * Returns information about what actions can be made against an entity.
     *
     * @see EntityInformationEntity
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityInformation(): EntityInformationEntity
    {
        return EntityInformationEntity::fromResponse(
            $this->client->get("ExpenseItems/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ExpenseItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ExpenseItemQueryBuilder
    {
        return new ExpenseItemQueryBuilder($this->client);
    }

    /**
     * Updates the expenseitem.
     *
     * @param  ExpenseItemEntity  $resource  The expenseitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ExpenseItemEntity $resource): Response
    {
        $expenseReportID = $resource->expenseReportID;
        return $this->client->put("Expenses/$expenseReportID/Items", $resource->toArray());
    }
}
