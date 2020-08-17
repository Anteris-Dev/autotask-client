<?php

namespace Anteris\Autotask\API\InternalLocations;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask InternalLocations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InternalLocationsEntity.htm Autotask documentation.
 */
class InternalLocationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the InternalLocation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InternalLocationEntity
    {
        return InternalLocationEntity::fromResponse(
            $this->client->get("InternalLocations/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InternalLocationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InternalLocationQueryBuilder
    {
        return new InternalLocationQueryBuilder($this->client);
    }

}
