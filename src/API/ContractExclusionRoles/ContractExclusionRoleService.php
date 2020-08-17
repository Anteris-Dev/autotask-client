<?php

namespace Anteris\Autotask\API\ContractExclusionRoles;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractExclusionRoles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractExclusionRolesEntity.htm Autotask documentation.
 */
class ContractExclusionRoleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractexclusionrole.
     *
     * @param  ContractExclusionRoleEntity  $resource  The contractexclusionrole entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractExclusionRoleEntity $resource)
    {
        $this->client->post("ContractExclusionRoles", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContractExclusionRole to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContractExclusionRoles/$id");
    }

    /**
     * Finds the ContractExclusionRole based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractExclusionRoleEntity
    {
        return ContractExclusionRoleEntity::fromResponse(
            $this->client->get("ContractExclusionRoles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractExclusionRoleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractExclusionRoleQueryBuilder
    {
        return new ContractExclusionRoleQueryBuilder($this->client);
    }

}
