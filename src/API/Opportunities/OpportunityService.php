<?php

namespace Anteris\Autotask\API\Opportunities;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Opportunities.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/OpportunitiesEntity.htm Autotask documentation.
 */
class OpportunityService
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
     * Creates a new opportunity.
     *
     * @param  OpportunityEntity  $resource  The opportunity entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(OpportunityEntity $resource): Response
    {
        return $this->client->post("Opportunities", $resource->toArray());
    }

    /**
     * Finds the Opportunity based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): OpportunityEntity
    {
        return OpportunityEntity::fromResponse(
            $this->client->get("Opportunities/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see OpportunityQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): OpportunityQueryBuilder
    {
        return new OpportunityQueryBuilder($this->client);
    }

    /**
     * Updates the opportunity.
     *
     * @param  OpportunityEntity  $resource  The opportunity entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(OpportunityEntity $resource): Response
    {
        return $this->client->put("Opportunities", $resource->toArray());
    }
}
