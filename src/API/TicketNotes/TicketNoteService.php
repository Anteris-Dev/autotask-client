<?php

namespace Anteris\Autotask\API\TicketNotes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketNotesEntity.htm Autotask documentation.
 */
class TicketNoteService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketnote.
     *
     * @param  TicketNoteEntity  $resource  The ticketnote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketNoteEntity $resource)
    {
        $this->client->post("TicketNotes", $resource->toArray());
    }


    /**
     * Finds the TicketNote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketNoteEntity
    {
        return TicketNoteEntity::fromResponse(
            $this->client->get("TicketNotes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketNoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketNoteQueryBuilder
    {
        return new TicketNoteQueryBuilder($this->client);
    }

    /**
     * Updates the ticketnote.
     *
     * @param  TicketNoteEntity  $resource  The ticketnote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketNoteEntity $resource): void
    {
        $this->client->put("TicketNotes/$resource->id", $resource->toArray());
    }
}
