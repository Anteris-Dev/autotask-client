<?php

namespace Anteris\Autotask\API\PriceListMaterialCodes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PriceListMaterialCodes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListMaterialCodesEntity.htm Autotask documentation.
 */
class PriceListMaterialCodeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the PriceListMaterialCode based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PriceListMaterialCodeEntity
    {
        return PriceListMaterialCodeEntity::fromResponse(
            $this->client->get("PriceListMaterialCodes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PriceListMaterialCodeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PriceListMaterialCodeQueryBuilder
    {
        return new PriceListMaterialCodeQueryBuilder($this->client);
    }

    /**
     * Updates the pricelistmaterialcode.
     *
     * @param  PriceListMaterialCodeEntity  $resource  The pricelistmaterialcode entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PriceListMaterialCodeEntity $resource): void
    {
        $this->client->put("PriceListMaterialCodes/$resource->id", $resource->toArray());
    }
}
