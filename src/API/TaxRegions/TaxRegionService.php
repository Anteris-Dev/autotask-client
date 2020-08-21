<?php

namespace Anteris\Autotask\API\TaxRegions;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TaxRegions.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaxRegionsEntity.htm Autotask documentation.
 */
class TaxRegionService
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
     * Creates a new taxregion.
     *
     * @param  TaxRegionEntity  $resource  The taxregion entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaxRegionEntity $resource): Response
    {
        return $this->client->post("TaxRegions", $resource->toArray());
    }

    /**
     * Finds the TaxRegion based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TaxRegionEntity
    {
        return TaxRegionEntity::fromResponse(
            $this->client->get("TaxRegions/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TaxRegionQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TaxRegionQueryBuilder
    {
        return new TaxRegionQueryBuilder($this->client);
    }

    /**
     * Updates the taxregion.
     *
     * @param  TaxRegionEntity  $resource  The taxregion entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TaxRegionEntity $resource): Response
    {
        return $this->client->put("TaxRegions", $resource->toArray());
    }
}
