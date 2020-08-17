<?php

namespace Anteris\Autotask\API\PriceListServiceBundles;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PriceListServiceBundles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListServiceBundlesEntity.htm Autotask documentation.
 */
class PriceListServiceBundleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the PriceListServiceBundle based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PriceListServiceBundleEntity
    {
        return PriceListServiceBundleEntity::fromResponse(
            $this->client->get("PriceListServiceBundles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PriceListServiceBundleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PriceListServiceBundleQueryBuilder
    {
        return new PriceListServiceBundleQueryBuilder($this->client);
    }

    /**
     * Updates the pricelistservicebundle.
     *
     * @param  PriceListServiceBundleEntity  $resource  The pricelistservicebundle entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PriceListServiceBundleEntity $resource): void
    {
        $this->client->put("PriceListServiceBundles/$resource->id", $resource->toArray());
    }
}
