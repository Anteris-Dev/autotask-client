<?php

namespace Anteris\Autotask\API\ContractBlockHourFactors;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractBlockHourFactors.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractBlockHourFactorsEntity.htm Autotask documentation.
 */
class ContractBlockHourFactorService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractblockhourfactor.
     *
     * @param  ContractBlockHourFactorEntity  $resource  The contractblockhourfactor entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractBlockHourFactorEntity $resource)
    {
        $this->client->post("ContractBlockHourFactors", $resource->toArray());
    }


    /**
     * Finds the ContractBlockHourFactor based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractBlockHourFactorEntity
    {
        return ContractBlockHourFactorEntity::fromResponse(
            $this->client->get("ContractBlockHourFactors/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractBlockHourFactorQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractBlockHourFactorQueryBuilder
    {
        return new ContractBlockHourFactorQueryBuilder($this->client);
    }

    /**
     * Updates the contractblockhourfactor.
     *
     * @param  ContractBlockHourFactorEntity  $resource  The contractblockhourfactor entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractBlockHourFactorEntity $resource): void
    {
        $this->client->put("ContractBlockHourFactors/$resource->id", $resource->toArray());
    }
}
