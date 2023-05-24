<?php

namespace Anteris\Autotask\API\PurchaseOrderItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask PurchaseOrderItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PurchaseOrderItemsEntity.htm Autotask documentation.
 */
class PurchaseOrderItemService
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
     * Creates a new purchaseorderitem.
     *
     * @param  PurchaseOrderItemEntity  $resource  The purchaseorderitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(PurchaseOrderItemEntity $resource): Response
    {
        $orderID = $resource->orderID;
        return $this->client->post("PurchaseOrders/$orderID/Items", $resource->toArray());
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("PurchaseOrderItems/entityInformation/fields")
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
            $this->client->get("PurchaseOrderItems/entityInformation")
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
    public function update(PurchaseOrderItemEntity $resource): Response
    {
        $orderID = $resource->orderID;
        return $this->client->put("PurchaseOrders/$orderID/Items", $resource->toArray());
    }
}
