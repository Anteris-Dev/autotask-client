<?php

namespace Anteris\Autotask\API\InventoryItemSerialNumbers;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask InventoryItemSerialNumbers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InventoryItemSerialNumbersEntity.htm Autotask documentation.
 */
class InventoryItemSerialNumberService
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
     * Creates a new inventoryitemserialnumber.
     *
     * @param  InventoryItemSerialNumberEntity  $resource  The inventoryitemserialnumber entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(InventoryItemSerialNumberEntity $resource): Response
    {
        $inventoryItemID = $resource->inventoryItemID;
        return $this->client->post("InventoryItems/$inventoryItemID/SerialNumbers", $resource->toArray());
    }

    /**
     * Finds the InventoryItemSerialNumber based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InventoryItemSerialNumberEntity
    {
        return InventoryItemSerialNumberEntity::fromResponse(
            $this->client->get("InventoryItemSerialNumbers/$id")
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
            $this->client->get("InventoryItemSerialNumbers/entityInformation/fields")
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
            $this->client->get("InventoryItemSerialNumbers/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InventoryItemSerialNumberQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InventoryItemSerialNumberQueryBuilder
    {
        return new InventoryItemSerialNumberQueryBuilder($this->client);
    }

    /**
     * Updates the inventoryitemserialnumber.
     *
     * @param  InventoryItemSerialNumberEntity  $resource  The inventoryitemserialnumber entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InventoryItemSerialNumberEntity $resource): Response
    {
        $inventoryItemID = $resource->inventoryItemID;
        return $this->client->put("InventoryItems/$inventoryItemID/SerialNumbers", $resource->toArray());
    }
}
