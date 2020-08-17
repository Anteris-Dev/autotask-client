<?php

namespace Anteris\Autotask\API\PriceListProductTiers;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PriceListProductTiers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListProductTiersEntity.htm Autotask documentation.
 */
class PriceListProductTierService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the PriceListProductTier based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PriceListProductTierEntity
    {
        return PriceListProductTierEntity::fromResponse(
            $this->client->get("PriceListProductTiers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PriceListProductTierQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PriceListProductTierQueryBuilder
    {
        return new PriceListProductTierQueryBuilder($this->client);
    }

    /**
     * Updates the pricelistproducttier.
     *
     * @param  PriceListProductTierEntity  $resource  The pricelistproducttier entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PriceListProductTierEntity $resource): void
    {
        $this->client->put("PriceListProductTiers/$resource->id", $resource->toArray());
    }
}
