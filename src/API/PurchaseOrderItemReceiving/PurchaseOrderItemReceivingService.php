<?php

namespace Anteris\Autotask\API\PurchaseOrderItemReceiving;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask PurchaseOrderItemReceiving.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PurchaseOrderItemReceivingEntity.htm Autotask documentation.
 */
class PurchaseOrderItemReceivingService
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
     * Creates a new purchaseorderitemreceiving.
     *
     * @param  PurchaseOrderItemReceivingEntity  $resource  The purchaseorderitemreceiving entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(PurchaseOrderItemReceivingEntity $resource): Response
    {
        $purchaseOrderItemID = $resource->purchaseOrderItemID;
        return $this->client->post("PurchaseOrderItems/$purchaseOrderItemID/Receiving", $resource->toArray());
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("PurchaseOrderItemReceiving/entityInformation/fields")
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
            $this->client->get("PurchaseOrderItemReceiving/entityInformation")
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
