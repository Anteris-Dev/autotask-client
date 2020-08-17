<?php

namespace Anteris\Autotask\API\CompanyNotes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyNotesEntity.htm Autotask documentation.
 */
class CompanyNoteService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new companynote.
     *
     * @param  CompanyNoteEntity  $resource  The companynote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyNoteEntity $resource)
    {
        $this->client->post("CompanyNotes", $resource->toArray());
    }


    /**
     * Finds the CompanyNote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyNoteEntity
    {
        return CompanyNoteEntity::fromResponse(
            $this->client->get("CompanyNotes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyNoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyNoteQueryBuilder
    {
        return new CompanyNoteQueryBuilder($this->client);
    }

    /**
     * Updates the companynote.
     *
     * @param  CompanyNoteEntity  $resource  The companynote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyNoteEntity $resource): void
    {
        $this->client->put("CompanyNotes/$resource->id", $resource->toArray());
    }
}
