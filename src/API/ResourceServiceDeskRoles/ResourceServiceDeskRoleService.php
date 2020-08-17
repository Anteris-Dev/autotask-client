<?php

namespace Anteris\Autotask\API\ResourceServiceDeskRoles;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ResourceServiceDeskRoles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourceServiceDeskRolesEntity.htm Autotask documentation.
 */
class ResourceServiceDeskRoleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new resourceservicedeskrole.
     *
     * @param  ResourceServiceDeskRoleEntity  $resource  The resourceservicedeskrole entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ResourceServiceDeskRoleEntity $resource)
    {
        $this->client->post("ResourceServiceDeskRoles", $resource->toArray());
    }


    /**
     * Finds the ResourceServiceDeskRole based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ResourceServiceDeskRoleEntity
    {
        return ResourceServiceDeskRoleEntity::fromResponse(
            $this->client->get("ResourceServiceDeskRoles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ResourceServiceDeskRoleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ResourceServiceDeskRoleQueryBuilder
    {
        return new ResourceServiceDeskRoleQueryBuilder($this->client);
    }

    /**
     * Updates the resourceservicedeskrole.
     *
     * @param  ResourceServiceDeskRoleEntity  $resource  The resourceservicedeskrole entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ResourceServiceDeskRoleEntity $resource): void
    {
        $this->client->put("ResourceServiceDeskRoles/$resource->id", $resource->toArray());
    }
}
