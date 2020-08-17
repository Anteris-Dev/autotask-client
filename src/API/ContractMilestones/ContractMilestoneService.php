<?php

namespace Anteris\Autotask\API\ContractMilestones;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractMilestones.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractMilestonesEntity.htm Autotask documentation.
 */
class ContractMilestoneService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractmilestone.
     *
     * @param  ContractMilestoneEntity  $resource  The contractmilestone entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractMilestoneEntity $resource)
    {
        $this->client->post("ContractMilestones", $resource->toArray());
    }


    /**
     * Finds the ContractMilestone based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractMilestoneEntity
    {
        return ContractMilestoneEntity::fromResponse(
            $this->client->get("ContractMilestones/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractMilestoneQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractMilestoneQueryBuilder
    {
        return new ContractMilestoneQueryBuilder($this->client);
    }

    /**
     * Updates the contractmilestone.
     *
     * @param  ContractMilestoneEntity  $resource  The contractmilestone entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractMilestoneEntity $resource): void
    {
        $this->client->put("ContractMilestones/$resource->id", $resource->toArray());
    }
}
