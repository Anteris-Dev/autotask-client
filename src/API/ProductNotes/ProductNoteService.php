<?php

namespace Anteris\Autotask\API\ProductNotes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ProductNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProductNotesEntity.htm Autotask documentation.
 */
class ProductNoteService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new productnote.
     *
     * @param  ProductNoteEntity  $resource  The productnote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProductNoteEntity $resource)
    {
        $this->client->post("ProductNotes", $resource->toArray());
    }


    /**
     * Finds the ProductNote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProductNoteEntity
    {
        return ProductNoteEntity::fromResponse(
            $this->client->get("ProductNotes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProductNoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProductNoteQueryBuilder
    {
        return new ProductNoteQueryBuilder($this->client);
    }

    /**
     * Updates the productnote.
     *
     * @param  ProductNoteEntity  $resource  The productnote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ProductNoteEntity $resource): void
    {
        $this->client->put("ProductNotes/$resource->id", $resource->toArray());
    }
}
