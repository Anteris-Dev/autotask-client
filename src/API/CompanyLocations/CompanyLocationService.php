<?php

namespace Anteris\Autotask\API\CompanyLocations;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyLocations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyLocationsEntity.htm Autotask documentation.
 */
class CompanyLocationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new companylocation.
     *
     * @param  CompanyLocationEntity  $resource  The companylocation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyLocationEntity $resource)
    {
        $this->client->post("CompanyLocations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyLocation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyLocations/$id");
    }

    /**
     * Finds the CompanyLocation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyLocationEntity
    {
        return CompanyLocationEntity::fromResponse(
            $this->client->get("CompanyLocations/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyLocationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyLocationQueryBuilder
    {
        return new CompanyLocationQueryBuilder($this->client);
    }

    /**
     * Updates the companylocation.
     *
     * @param  CompanyLocationEntity  $resource  The companylocation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyLocationEntity $resource): void
    {
        $this->client->put("CompanyLocations/$resource->id", $resource->toArray());
    }
}
