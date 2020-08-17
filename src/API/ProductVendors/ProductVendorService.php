<?php

namespace Anteris\Autotask\API\ProductVendors;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ProductVendors.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProductVendorsEntity.htm Autotask documentation.
 */
class ProductVendorService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new productvendor.
     *
     * @param  ProductVendorEntity  $resource  The productvendor entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProductVendorEntity $resource)
    {
        $this->client->post("ProductVendors", $resource->toArray());
    }


    /**
     * Finds the ProductVendor based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProductVendorEntity
    {
        return ProductVendorEntity::fromResponse(
            $this->client->get("ProductVendors/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProductVendorQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProductVendorQueryBuilder
    {
        return new ProductVendorQueryBuilder($this->client);
    }

    /**
     * Updates the productvendor.
     *
     * @param  ProductVendorEntity  $resource  The productvendor entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ProductVendorEntity $resource): void
    {
        $this->client->put("ProductVendors/$resource->id", $resource->toArray());
    }
}
