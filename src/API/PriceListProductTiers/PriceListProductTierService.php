<?php

namespace Anteris\Autotask\API\PriceListProductTiers;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask PriceListProductTiers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListProductTiersEntity.htm Autotask documentation.
 */
class PriceListProductTierService
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("PriceListProductTiers/entityInformation/fields")
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
            $this->client->get("PriceListProductTiers/entityInformation")
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
    public function update(PriceListProductTierEntity $resource): Response
    {
        return $this->client->put("PriceListProductTiers", $resource->toArray());
    }
}
