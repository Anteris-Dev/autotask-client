<?php

namespace Anteris\Autotask\API\ProductTiers;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ProductTiers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProductTiersEntity.htm Autotask documentation.
 */
class ProductTierService
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
     * Creates a new producttier.
     *
     * @param  ProductTierEntity  $resource  The producttier entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProductTierEntity $resource): Response
    {
        $productID = $resource->productID;
        return $this->client->post("Products/$productID/Tiers", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $productID  ID of the ProductTier parent resource.
     * @param  int  $id  ID of the ProductTier to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $productID,int $id): void
    {
        $this->client->delete("Products/$productID/Tiers/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ProductTiers/entityInformation/fields")
        );
    }

    /**
     * Returns information about what actions can be made against an entity.
     *
     * @see EntityInformationEntity
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityInformation(): EntityInformationEntity
    {
        return EntityInformationEntity::fromResponse(
            $this->client->get("ProductTiers/entityInformation")
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
    public function update(ProductTierEntity $resource): Response
    {
        $productID = $resource->productID;
        return $this->client->put("Products/$productID/Tiers", $resource->toArray());
    }
}
