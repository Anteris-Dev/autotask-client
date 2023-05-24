<?php

namespace Anteris\Autotask\API\ResourceServiceDeskRoles;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ResourceServiceDeskRoles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourceServiceDeskRolesEntity.htm Autotask documentation.
 */
class ResourceServiceDeskRoleService
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
     * Creates a new resourceservicedeskrole.
     *
     * @param  ResourceServiceDeskRoleEntity  $resource  The resourceservicedeskrole entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ResourceServiceDeskRoleEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->post("Resources/$resourceID/ServiceDeskRoles", $resource->toArray());
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ResourceServiceDeskRoles/entityInformation/fields")
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
            $this->client->get("ResourceServiceDeskRoles/entityInformation")
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
    public function update(ResourceServiceDeskRoleEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->put("Resources/$resourceID/ServiceDeskRoles", $resource->toArray());
    }
}
