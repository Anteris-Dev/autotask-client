<?php

namespace Anteris\Autotask\API\ShippingTypes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ShippingTypes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ShippingTypesEntity.htm Autotask documentation.
 */
class ShippingTypeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the ShippingType based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ShippingTypeEntity
    {
        return ShippingTypeEntity::fromResponse(
            $this->client->get("ShippingTypes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ShippingTypeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ShippingTypeQueryBuilder
    {
        return new ShippingTypeQueryBuilder($this->client);
    }

}
