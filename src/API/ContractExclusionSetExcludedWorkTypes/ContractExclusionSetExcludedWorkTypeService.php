<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedWorkTypes;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractExclusionSetExcludedWorkTypes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractExclusionSetExcludedWorkTypesEntity.htm Autotask documentation.
 */
class ContractExclusionSetExcludedWorkTypeService
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
     * Creates a new contractexclusionsetexcludedworktype.
     *
     * @param  ContractExclusionSetExcludedWorkTypeEntity  $resource  The contractexclusionsetexcludedworktype entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractExclusionSetExcludedWorkTypeEntity $resource): Response
    {
        $contractExlusionSetID = $resource->contractExlusionSetID;
        return $this->client->post("ContractExlusionSets/$contractExlusionSetID/ExcludedWorkTypes", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $contractExlusionSetID  ID of the ContractExclusionSetExcludedWorkType parent resource.
     * @param  int  $id  ID of the ContractExclusionSetExcludedWorkType to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $contractExlusionSetID,int $id): void
    {
        $this->client->delete("ContractExlusionSets/$contractExlusionSetID/ExcludedWorkTypes/$id");
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
