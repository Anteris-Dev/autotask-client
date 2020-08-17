<?php

namespace Anteris\Autotask\API\QuoteLocations;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask QuoteLocations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/QuoteLocationsEntity.htm Autotask documentation.
 */
class QuoteLocationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new quotelocation.
     *
     * @param  QuoteLocationEntity  $resource  The quotelocation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(QuoteLocationEntity $resource)
    {
        $this->client->post("QuoteLocations", $resource->toArray());
    }


    /**
     * Finds the QuoteLocation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): QuoteLocationEntity
    {
        return QuoteLocationEntity::fromResponse(
            $this->client->get("QuoteLocations/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see QuoteLocationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): QuoteLocationQueryBuilder
    {
        return new QuoteLocationQueryBuilder($this->client);
    }

    /**
     * Updates the quotelocation.
     *
     * @param  QuoteLocationEntity  $resource  The quotelocation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(QuoteLocationEntity $resource): void
    {
        $this->client->put("QuoteLocations/$resource->id", $resource->toArray());
    }
}
