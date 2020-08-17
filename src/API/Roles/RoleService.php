<?php

namespace Anteris\Autotask\API\Roles;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Roles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/RolesEntity.htm Autotask documentation.
 */
class RoleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new role.
     *
     * @param  RoleEntity  $resource  The role entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(RoleEntity $resource)
    {
        $this->client->post("Roles", $resource->toArray());
    }


    /**
     * Finds the Role based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): RoleEntity
    {
        return RoleEntity::fromResponse(
            $this->client->get("Roles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see RoleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): RoleQueryBuilder
    {
        return new RoleQueryBuilder($this->client);
    }

    /**
     * Updates the role.
     *
     * @param  RoleEntity  $resource  The role entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(RoleEntity $resource): void
    {
        $this->client->put("Roles/$resource->id", $resource->toArray());
    }
}
