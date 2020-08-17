<?php

namespace Anteris\Autotask\API\Currencies;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Currencies.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CurrenciesEntity.htm Autotask documentation.
 */
class CurrencyService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the Currency based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CurrencyEntity
    {
        return CurrencyEntity::fromResponse(
            $this->client->get("Currencies/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CurrencyQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CurrencyQueryBuilder
    {
        return new CurrencyQueryBuilder($this->client);
    }

    /**
     * Updates the currency.
     *
     * @param  CurrencyEntity  $resource  The currency entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CurrencyEntity $resource): void
    {
        $this->client->put("Currencies/$resource->id", $resource->toArray());
    }
}
