<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedRoles;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractExclusionSetExcludedRoles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractExclusionSetExcludedRolesEntity.htm Autotask documentation.
 */
class ContractExclusionSetExcludedRoleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractexclusionsetexcludedrole.
     *
     * @param  ContractExclusionSetExcludedRoleEntity  $resource  The contractexclusionsetexcludedrole entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractExclusionSetExcludedRoleEntity $resource)
    {
        $this->client->post("ContractExclusionSetExcludedRoles", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContractExclusionSetExcludedRole to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContractExclusionSetExcludedRoles/$id");
    }

    /**
     * Finds the ContractExclusionSetExcludedRole based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractExclusionSetExcludedRoleEntity
    {
        return ContractExclusionSetExcludedRoleEntity::fromResponse(
            $this->client->get("ContractExclusionSetExcludedRoles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractExclusionSetExcludedRoleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractExclusionSetExcludedRoleQueryBuilder
    {
        return new ContractExclusionSetExcludedRoleQueryBuilder($this->client);
    }

}
