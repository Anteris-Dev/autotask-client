<?php

namespace Anteris\Autotask\API\ContractCharges;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractCharges.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractChargesEntity.htm Autotask documentation.
 */
class ContractChargeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractcharge.
     *
     * @param  ContractChargeEntity  $resource  The contractcharge entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractChargeEntity $resource)
    {
        $this->client->post("ContractCharges", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContractCharge to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContractCharges/$id");
    }

    /**
     * Finds the ContractCharge based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractChargeEntity
    {
        return ContractChargeEntity::fromResponse(
            $this->client->get("ContractCharges/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractChargeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractChargeQueryBuilder
    {
        return new ContractChargeQueryBuilder($this->client);
    }

    /**
     * Updates the contractcharge.
     *
     * @param  ContractChargeEntity  $resource  The contractcharge entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractChargeEntity $resource): void
    {
        $this->client->put("ContractCharges/$resource->id", $resource->toArray());
    }
}
