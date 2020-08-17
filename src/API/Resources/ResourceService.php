<?php

namespace Anteris\Autotask\API\Resources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Resources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourcesEntity.htm Autotask documentation.
 */
class ResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the Resource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ResourceEntity
    {
        return ResourceEntity::fromResponse(
            $this->client->get("Resources/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ResourceQueryBuilder
    {
        return new ResourceQueryBuilder($this->client);
    }

    /**
     * Updates the resource.
     *
     * @param  ResourceEntity  $resource  The resource entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ResourceEntity $resource): void
    {
        $this->client->put("Resources/$resource->id", $resource->toArray());
    }
}