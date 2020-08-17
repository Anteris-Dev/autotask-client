<?php

namespace Anteris\Autotask\API\Products;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Products.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProductsEntity.htm Autotask documentation.
 */
class ProductService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new product.
     *
     * @param  ProductEntity  $resource  The product entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProductEntity $resource)
    {
        $this->client->post("Products", $resource->toArray());
    }


    /**
     * Finds the Product based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProductEntity
    {
        return ProductEntity::fromResponse(
            $this->client->get("Products/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProductQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProductQueryBuilder
    {
        return new ProductQueryBuilder($this->client);
    }

    /**
     * Updates the product.
     *
     * @param  ProductEntity  $resource  The product entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ProductEntity $resource): void
    {
        $this->client->put("Products/$resource->id", $resource->toArray());
    }
}
