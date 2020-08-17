<?php

namespace Anteris\Autotask\API\ResourceRoleQueues;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ResourceRoleQueues.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourceRoleQueuesEntity.htm Autotask documentation.
 */
class ResourceRoleQueueService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new resourcerolequeue.
     *
     * @param  ResourceRoleQueueEntity  $resource  The resourcerolequeue entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ResourceRoleQueueEntity $resource)
    {
        $this->client->post("ResourceRoleQueues", $resource->toArray());
    }


    /**
     * Finds the ResourceRoleQueue based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ResourceRoleQueueEntity
    {
        return ResourceRoleQueueEntity::fromResponse(
            $this->client->get("ResourceRoleQueues/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ResourceRoleQueueQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ResourceRoleQueueQueryBuilder
    {
        return new ResourceRoleQueueQueryBuilder($this->client);
    }

    /**
     * Updates the resourcerolequeue.
     *
     * @param  ResourceRoleQueueEntity  $resource  The resourcerolequeue entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ResourceRoleQueueEntity $resource): void
    {
        $this->client->put("ResourceRoleQueues/$resource->id", $resource->toArray());
    }
}
