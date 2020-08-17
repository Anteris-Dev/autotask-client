<?php

namespace Anteris\Autotask\API\ExpenseItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ExpenseItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ExpenseItemsEntity.htm Autotask documentation.
 */
class ExpenseItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(ExpenseItemEntity $resource)
    {
        $this->client->post("ExpenseItems", $resource->toArray());
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
    public function update(ExpenseItemEntity $resource): void
    {
        $this->client->put("ExpenseItems/$resource->id", $resource->toArray());
    }
}
