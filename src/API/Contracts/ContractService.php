<?php

namespace Anteris\Autotask\API\Contracts;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Contracts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractsEntity.htm Autotask documentation.
 */
class ContractService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contract.
     *
     * @param  ContractEntity  $resource  The contract entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractEntity $resource)
    {
        $this->client->post("Contracts", $resource->toArray());
    }


    /**
     * Finds the Contract based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractEntity
    {
        return ContractEntity::fromResponse(
            $this->client->get("Contracts/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractQueryBuilder
    {
        return new ContractQueryBuilder($this->client);
    }

    /**
     * Updates the contract.
     *
     * @param  ContractEntity  $resource  The contract entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractEntity $resource): void
    {
        $this->client->put("Contracts/$resource->id", $resource->toArray());
    }
}
