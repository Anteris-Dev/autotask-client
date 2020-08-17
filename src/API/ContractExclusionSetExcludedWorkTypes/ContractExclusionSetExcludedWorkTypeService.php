<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedWorkTypes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractExclusionSetExcludedWorkTypes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractExclusionSetExcludedWorkTypesEntity.htm Autotask documentation.
 */
class ContractExclusionSetExcludedWorkTypeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractexclusionsetexcludedworktype.
     *
     * @param  ContractExclusionSetExcludedWorkTypeEntity  $resource  The contractexclusionsetexcludedworktype entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractExclusionSetExcludedWorkTypeEntity $resource)
    {
        $this->client->post("ContractExclusionSetExcludedWorkTypes", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContractExclusionSetExcludedWorkType to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContractExclusionSetExcludedWorkTypes/$id");
    }

    /**
     * Finds the ContractExclusionSetExcludedWorkType based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractExclusionSetExcludedWorkTypeEntity
    {
        return ContractExclusionSetExcludedWorkTypeEntity::fromResponse(
            $this->client->get("ContractExclusionSetExcludedWorkTypes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractExclusionSetExcludedWorkTypeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractExclusionSetExcludedWorkTypeQueryBuilder
    {
        return new ContractExclusionSetExcludedWorkTypeQueryBuilder($this->client);
    }

}
