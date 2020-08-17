<?php

namespace Anteris\Autotask\API\InventoryTransfers;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask InventoryTransfers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InventoryTransfersEntity.htm Autotask documentation.
 */
class InventoryTransferService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new inventorytransfer.
     *
     * @param  InventoryTransferEntity  $resource  The inventorytransfer entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(InventoryTransferEntity $resource)
    {
        $this->client->post("InventoryTransfers", $resource->toArray());
    }


    /**
     * Finds the InventoryTransfer based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InventoryTransferEntity
    {
        return InventoryTransferEntity::fromResponse(
            $this->client->get("InventoryTransfers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InventoryTransferQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InventoryTransferQueryBuilder
    {
        return new InventoryTransferQueryBuilder($this->client);
    }

}
