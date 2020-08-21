<?php

namespace Anteris\Autotask\API\PriceListServices;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask PriceListServices.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListServicesEntity.htm Autotask documentation.
 */
class PriceListServiceService
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
     * Finds the PriceListService based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PriceListServiceEntity
    {
        return PriceListServiceEntity::fromResponse(
            $this->client->get("PriceListServices/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PriceListServiceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PriceListServiceQueryBuilder
    {
        return new PriceListServiceQueryBuilder($this->client);
    }

    /**
     * Updates the pricelistservice.
     *
     * @param  PriceListServiceEntity  $resource  The pricelistservice entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PriceListServiceEntity $resource): Response
    {
        return $this->client->put("PriceListServices", $resource->toArray());
    }
}
