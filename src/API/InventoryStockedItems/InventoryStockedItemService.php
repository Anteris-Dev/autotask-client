<?php

namespace Anteris\Autotask\API\InventoryStockedItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask InventoryStockedItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InventoryStockedItemsEntity.htm Autotask documentation.
 */
class InventoryStockedItemService
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
     * Finds the InventoryStockedItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InventoryStockedItemEntity
    {
        return InventoryStockedItemEntity::fromResponse(
            $this->client->get("InventoryStockedItems/$id")
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
            $this->client->get("InventoryStockedItems/entityInformation/fields")
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
            $this->client->get("InventoryStockedItems/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InventoryStockedItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InventoryStockedItemQueryBuilder
    {
        return new InventoryStockedItemQueryBuilder($this->client);
    }

    /**
     * Updates the inventorystockeditem.
     *
     * @param  InventoryStockedItemEntity  $resource  The inventorystockeditem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InventoryStockedItemEntity $resource): Response
    {
        return $this->client->put("InventoryStockedItems", $resource->toArray());
    }
}
