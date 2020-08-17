<?php

namespace Anteris\Autotask\API\Quotes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Quotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/QuotesEntity.htm Autotask documentation.
 */
class QuoteService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new quote.
     *
     * @param  QuoteEntity  $resource  The quote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(QuoteEntity $resource)
    {
        $this->client->post("Quotes", $resource->toArray());
    }


    /**
     * Finds the Quote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): QuoteEntity
    {
        return QuoteEntity::fromResponse(
            $this->client->get("Quotes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see QuoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): QuoteQueryBuilder
    {
        return new QuoteQueryBuilder($this->client);
    }

    /**
     * Updates the quote.
     *
     * @param  QuoteEntity  $resource  The quote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(QuoteEntity $resource): void
    {
        $this->client->put("Quotes/$resource->id", $resource->toArray());
    }
}
