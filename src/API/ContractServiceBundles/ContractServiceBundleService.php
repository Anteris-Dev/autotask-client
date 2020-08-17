<?php

namespace Anteris\Autotask\API\ContractServiceBundles;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractServiceBundles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServiceBundlesEntity.htm Autotask documentation.
 */
class ContractServiceBundleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractservicebundle.
     *
     * @param  ContractServiceBundleEntity  $resource  The contractservicebundle entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractServiceBundleEntity $resource)
    {
        $this->client->post("ContractServiceBundles", $resource->toArray());
    }


    /**
     * Finds the ContractServiceBundle based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractServiceBundleEntity
    {
        return ContractServiceBundleEntity::fromResponse(
            $this->client->get("ContractServiceBundles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractServiceBundleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractServiceBundleQueryBuilder
    {
        return new ContractServiceBundleQueryBuilder($this->client);
    }

    /**
     * Updates the contractservicebundle.
     *
     * @param  ContractServiceBundleEntity  $resource  The contractservicebundle entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractServiceBundleEntity $resource): void
    {
        $this->client->put("ContractServiceBundles/$resource->id", $resource->toArray());
    }
}
