<?php

namespace Anteris\Autotask\API\QuoteItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask QuoteItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/QuoteItemsEntity.htm Autotask documentation.
 */
class QuoteItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new quoteitem.
     *
     * @param  QuoteItemEntity  $resource  The quoteitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(QuoteItemEntity $resource)
    {
        $this->client->post("QuoteItems", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the QuoteItem to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("QuoteItems/$id");
    }

    /**
     * Finds the QuoteItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): QuoteItemEntity
    {
        return QuoteItemEntity::fromResponse(
            $this->client->get("QuoteItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see QuoteItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): QuoteItemQueryBuilder
    {
        return new QuoteItemQueryBuilder($this->client);
    }

    /**
     * Updates the quoteitem.
     *
     * @param  QuoteItemEntity  $resource  The quoteitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(QuoteItemEntity $resource): void
    {
        $this->client->put("QuoteItems/$resource->id", $resource->toArray());
    }
}
