<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedRoles;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractExclusionSetExcludedRoles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractExclusionSetExcludedRolesEntity.htm Autotask documentation.
 */
class ContractExclusionSetExcludedRoleService
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
     * Creates a new contractexclusionsetexcludedrole.
     *
     * @param  ContractExclusionSetExcludedRoleEntity  $resource  The contractexclusionsetexcludedrole entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractExclusionSetExcludedRoleEntity $resource): Response
    {
        $contractExlusionSetID = $resource->contractExlusionSetID;
        return $this->client->post("ContractExlusionSets/$contractExlusionSetID/ExcludedRoles", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $contractExlusionSetID  ID of the ContractExclusionSetExcludedRole parent resource.
     * @param  int  $id  ID of the ContractExclusionSetExcludedRole to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $contractExlusionSetID,int $id): void
    {
        $this->client->delete("ContractExlusionSets/$contractExlusionSetID/ExcludedRoles/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ContractExclusionSetExcludedRoles/entityInformation/fields")
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
            $this->client->get("ContractExclusionSetExcludedRoles/entityInformation")
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
