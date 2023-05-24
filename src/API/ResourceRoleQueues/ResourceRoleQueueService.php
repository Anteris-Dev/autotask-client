<?php

namespace Anteris\Autotask\API\ResourceRoleQueues;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ResourceRoleQueues.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourceRoleQueuesEntity.htm Autotask documentation.
 */
class ResourceRoleQueueService
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
     * Creates a new resourcerolequeue.
     *
     * @param  ResourceRoleQueueEntity  $resource  The resourcerolequeue entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ResourceRoleQueueEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->post("Resources/$resourceID/RoleQueues", $resource->toArray());
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ResourceRoleQueues/entityInformation/fields")
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
            $this->client->get("ResourceRoleQueues/entityInformation")
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
    public function update(ResourceRoleQueueEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->put("Resources/$resourceID/RoleQueues", $resource->toArray());
    }
}
