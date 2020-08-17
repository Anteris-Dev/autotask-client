<?php

namespace Anteris\Autotask\API\PurchaseOrderItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PurchaseOrderItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PurchaseOrderItemsEntity.htm Autotask documentation.
 */
class PurchaseOrderItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new purchaseorderitem.
     *
     * @param  PurchaseOrderItemEntity  $resource  The purchaseorderitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(PurchaseOrderItemEntity $resource)
    {
        $this->client->post("PurchaseOrderItems", $resource->toArray());
    }


    /**
     * Finds the PurchaseOrderItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PurchaseOrderItemEntity
    {
        return PurchaseOrderItemEntity::fromResponse(
            $this->client->get("PurchaseOrderItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PurchaseOrderItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PurchaseOrderItemQueryBuilder
    {
        return new PurchaseOrderItemQueryBuilder($this->client);
    }

    /**
     * Updates the purchaseorderitem.
     *
     * @param  PurchaseOrderItemEntity  $resource  The purchaseorderitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PurchaseOrderItemEntity $resource): void
    {
        $this->client->put("PurchaseOrderItems/$resource->id", $resource->toArray());
    }
}
