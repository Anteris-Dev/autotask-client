<?php

namespace Anteris\Autotask\API\ContractRetainers;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractRetainers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractRetainersEntity.htm Autotask documentation.
 */
class ContractRetainerService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractretainer.
     *
     * @param  ContractRetainerEntity  $resource  The contractretainer entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractRetainerEntity $resource)
    {
        $this->client->post("ContractRetainers", $resource->toArray());
    }


    /**
     * Finds the ContractRetainer based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractRetainerEntity
    {
        return ContractRetainerEntity::fromResponse(
            $this->client->get("ContractRetainers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractRetainerQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractRetainerQueryBuilder
    {
        return new ContractRetainerQueryBuilder($this->client);
    }

    /**
     * Updates the contractretainer.
     *
     * @param  ContractRetainerEntity  $resource  The contractretainer entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractRetainerEntity $resource): void
    {
        $this->client->put("ContractRetainers/$resource->id", $resource->toArray());
    }
}
