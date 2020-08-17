<?php

namespace Anteris\Autotask\API\ContractRates;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractRates.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractRatesEntity.htm Autotask documentation.
 */
class ContractRateService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractrate.
     *
     * @param  ContractRateEntity  $resource  The contractrate entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractRateEntity $resource)
    {
        $this->client->post("ContractRates", $resource->toArray());
    }


    /**
     * Finds the ContractRate based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractRateEntity
    {
        return ContractRateEntity::fromResponse(
            $this->client->get("ContractRates/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractRateQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractRateQueryBuilder
    {
        return new ContractRateQueryBuilder($this->client);
    }

    /**
     * Updates the contractrate.
     *
     * @param  ContractRateEntity  $resource  The contractrate entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractRateEntity $resource): void
    {
        $this->client->put("ContractRates/$resource->id", $resource->toArray());
    }
}
