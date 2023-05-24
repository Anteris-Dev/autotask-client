<?php

namespace Anteris\Autotask\API\Quotes;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Quotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/QuotesEntity.htm Autotask documentation.
 */
class QuoteService
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
     * Creates a new quote.
     *
     * @param  QuoteEntity  $resource  The quote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(QuoteEntity $resource): Response
    {
        return $this->client->post("Quotes", $resource->toArray());
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("Quotes/entityInformation/fields")
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
            $this->client->get("Quotes/entityInformation")
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
    public function update(QuoteEntity $resource): Response
    {
        return $this->client->put("Quotes", $resource->toArray());
    }
}
