<?php

namespace Anteris\Autotask\API\ContractServiceBundleUnits;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractServiceBundleUnits.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServiceBundleUnitsEntity.htm Autotask documentation.
 */
class ContractServiceBundleUnitService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the ContractServiceBundleUnit based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractServiceBundleUnitEntity
    {
        return ContractServiceBundleUnitEntity::fromResponse(
            $this->client->get("ContractServiceBundleUnits/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractServiceBundleUnitQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractServiceBundleUnitQueryBuilder
    {
        return new ContractServiceBundleUnitQueryBuilder($this->client);
    }

}
