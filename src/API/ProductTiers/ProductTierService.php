<?php

namespace Anteris\Autotask\API\ProductTiers;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ProductTiers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProductTiersEntity.htm Autotask documentation.
 */
class ProductTierService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new producttier.
     *
     * @param  ProductTierEntity  $resource  The producttier entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProductTierEntity $resource)
    {
        $this->client->post("ProductTiers", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ProductTier to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ProductTiers/$id");
    }

    /**
     * Finds the ProductTier based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProductTierEntity
    {
        return ProductTierEntity::fromResponse(
            $this->client->get("ProductTiers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProductTierQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProductTierQueryBuilder
    {
        return new ProductTierQueryBuilder($this->client);
    }

    /**
     * Updates the producttier.
     *
     * @param  ProductTierEntity  $resource  The producttier entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ProductTierEntity $resource): void
    {
        $this->client->put("ProductTiers/$resource->id", $resource->toArray());
    }
}
