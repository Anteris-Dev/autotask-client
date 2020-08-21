<?php

namespace Anteris\Autotask\API\ContractRoleCosts;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractRoleCosts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractRoleCostsEntity.htm Autotask documentation.
 */
class ContractRoleCostService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    /**
     * Instantiates the class.
     *
     * @param  HttpClient  $client  The http client that will be used to interact with the API.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractrolecost.
     *
     * @param  ContractRoleCostEntity  $resource  The contractrolecost entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractRoleCostEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->post("Contracts/$contractID/RoleCosts", $resource->toArray());
    }

    /**
     * Finds the ContractRoleCost based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractRoleCostEntity
    {
        return ContractRoleCostEntity::fromResponse(
            $this->client->get("ContractRoleCosts/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractRoleCostQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractRoleCostQueryBuilder
    {
        return new ContractRoleCostQueryBuilder($this->client);
    }

    /**
     * Updates the contractrolecost.
     *
     * @param  ContractRoleCostEntity  $resource  The contractrolecost entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractRoleCostEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->put("Contracts/$contractID/RoleCosts", $resource->toArray());
    }
}
