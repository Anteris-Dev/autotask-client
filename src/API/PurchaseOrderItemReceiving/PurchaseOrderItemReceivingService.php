<?php

namespace Anteris\Autotask\API\PurchaseOrderItemReceiving;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PurchaseOrderItemReceiving.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PurchaseOrderItemReceivingEntity.htm Autotask documentation.
 */
class PurchaseOrderItemReceivingService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new purchaseorderitemreceiving.
     *
     * @param  PurchaseOrderItemReceivingEntity  $resource  The purchaseorderitemreceiving entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(PurchaseOrderItemReceivingEntity $resource)
    {
        $this->client->post("PurchaseOrderItemReceiving", $resource->toArray());
    }


    /**
     * Finds the PurchaseOrderItemReceiving based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PurchaseOrderItemReceivingEntity
    {
        return PurchaseOrderItemReceivingEntity::fromResponse(
            $this->client->get("PurchaseOrderItemReceiving/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PurchaseOrderItemReceivingQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PurchaseOrderItemReceivingQueryBuilder
    {
        return new PurchaseOrderItemReceivingQueryBuilder($this->client);
    }

}
