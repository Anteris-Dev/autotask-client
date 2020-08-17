<?php

namespace Anteris\Autotask\API\ContractServices;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractServices.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServicesEntity.htm Autotask documentation.
 */
class ContractServiceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractservice.
     *
     * @param  ContractServiceEntity  $resource  The contractservice entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractServiceEntity $resource)
    {
        $this->client->post("ContractServices", $resource->toArray());
    }


    /**
     * Finds the ContractService based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractServiceEntity
    {
        return ContractServiceEntity::fromResponse(
            $this->client->get("ContractServices/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractServiceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractServiceQueryBuilder
    {
        return new ContractServiceQueryBuilder($this->client);
    }

    /**
     * Updates the contractservice.
     *
     * @param  ContractServiceEntity  $resource  The contractservice entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractServiceEntity $resource): void
    {
        $this->client->put("ContractServices/$resource->id", $resource->toArray());
    }
}
