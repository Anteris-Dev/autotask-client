<?php

namespace Anteris\Autotask\API\InventoryLocations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask InventoryLocations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InventoryLocationsEntity.htm Autotask documentation.
 */
class InventoryLocationService
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
     * Creates a new inventorylocation.
     *
     * @param  InventoryLocationEntity  $resource  The inventorylocation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(InventoryLocationEntity $resource): Response
    {
        return $this->client->post("InventoryLocations", $resource->toArray());
    }

    /**
     * Finds the InventoryLocation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InventoryLocationEntity
    {
        return InventoryLocationEntity::fromResponse(
            $this->client->get("InventoryLocations/$id")
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
            $this->client->get("InventoryLocations/entityInformation/fields")
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
            $this->client->get("InventoryLocations/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InventoryLocationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InventoryLocationQueryBuilder
    {
        return new InventoryLocationQueryBuilder($this->client);
    }

    /**
     * Updates the inventorylocation.
     *
     * @param  InventoryLocationEntity  $resource  The inventorylocation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InventoryLocationEntity $resource): Response
    {
        return $this->client->put("InventoryLocations", $resource->toArray());
    }
}
