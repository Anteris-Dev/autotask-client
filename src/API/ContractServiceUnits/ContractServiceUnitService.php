<?php

namespace Anteris\Autotask\API\ContractServiceUnits;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractServiceUnits.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServiceUnitsEntity.htm Autotask documentation.
 */
class ContractServiceUnitService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the ContractServiceUnit based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractServiceUnitEntity
    {
        return ContractServiceUnitEntity::fromResponse(
            $this->client->get("ContractServiceUnits/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractServiceUnitQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractServiceUnitQueryBuilder
    {
        return new ContractServiceUnitQueryBuilder($this->client);
    }

}
