<?php

namespace Anteris\Autotask\API\ContractBlocks;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractBlocks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractBlocksEntity.htm Autotask documentation.
 */
class ContractBlockService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractblock.
     *
     * @param  ContractBlockEntity  $resource  The contractblock entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractBlockEntity $resource)
    {
        $this->client->post("ContractBlocks", $resource->toArray());
    }


    /**
     * Finds the ContractBlock based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractBlockEntity
    {
        return ContractBlockEntity::fromResponse(
            $this->client->get("ContractBlocks/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractBlockQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractBlockQueryBuilder
    {
        return new ContractBlockQueryBuilder($this->client);
    }

    /**
     * Updates the contractblock.
     *
     * @param  ContractBlockEntity  $resource  The contractblock entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractBlockEntity $resource): void
    {
        $this->client->put("ContractBlocks/$resource->id", $resource->toArray());
    }
}
