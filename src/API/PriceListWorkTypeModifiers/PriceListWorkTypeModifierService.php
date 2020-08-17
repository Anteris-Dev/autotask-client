<?php

namespace Anteris\Autotask\API\PriceListWorkTypeModifiers;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PriceListWorkTypeModifiers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListWorkTypeModifiersEntity.htm Autotask documentation.
 */
class PriceListWorkTypeModifierService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the PriceListWorkTypeModifier based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PriceListWorkTypeModifierEntity
    {
        return PriceListWorkTypeModifierEntity::fromResponse(
            $this->client->get("PriceListWorkTypeModifiers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PriceListWorkTypeModifierQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PriceListWorkTypeModifierQueryBuilder
    {
        return new PriceListWorkTypeModifierQueryBuilder($this->client);
    }

    /**
     * Updates the pricelistworktypemodifier.
     *
     * @param  PriceListWorkTypeModifierEntity  $resource  The pricelistworktypemodifier entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PriceListWorkTypeModifierEntity $resource): void
    {
        $this->client->put("PriceListWorkTypeModifiers/$resource->id", $resource->toArray());
    }
}
