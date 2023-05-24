<?php

namespace Anteris\Autotask\API\PurchaseOrders;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask PurchaseOrders.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PurchaseOrdersEntity.htm Autotask documentation.
 */
class PurchaseOrderService
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
     * Creates a new purchaseorder.
     *
     * @param  PurchaseOrderEntity  $resource  The purchaseorder entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(PurchaseOrderEntity $resource): Response
    {
        return $this->client->post("PurchaseOrders", $resource->toArray());
    }

    /**
     * Finds the PurchaseOrder based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PurchaseOrderEntity
    {
        return PurchaseOrderEntity::fromResponse(
            $this->client->get("PurchaseOrders/$id")
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
            $this->client->get("PurchaseOrders/entityInformation/fields")
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
            $this->client->get("PurchaseOrders/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PurchaseOrderQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PurchaseOrderQueryBuilder
    {
        return new PurchaseOrderQueryBuilder($this->client);
    }

    /**
     * Updates the purchaseorder.
     *
     * @param  PurchaseOrderEntity  $resource  The purchaseorder entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PurchaseOrderEntity $resource): Response
    {
        return $this->client->put("PurchaseOrders", $resource->toArray());
    }
}
