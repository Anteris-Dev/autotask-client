<?php

namespace Anteris\Autotask\API\InventoryItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask InventoryItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InventoryItemsEntity.htm Autotask documentation.
 */
class InventoryItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new inventoryitem.
     *
     * @param  InventoryItemEntity  $resource  The inventoryitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(InventoryItemEntity $resource)
    {
        $this->client->post("InventoryItems", $resource->toArray());
    }


    /**
     * Finds the InventoryItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InventoryItemEntity
    {
        return InventoryItemEntity::fromResponse(
            $this->client->get("InventoryItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InventoryItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InventoryItemQueryBuilder
    {
        return new InventoryItemQueryBuilder($this->client);
    }

    /**
     * Updates the inventoryitem.
     *
     * @param  InventoryItemEntity  $resource  The inventoryitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InventoryItemEntity $resource): void
    {
        $this->client->put("InventoryItems/$resource->id", $resource->toArray());
    }
}
