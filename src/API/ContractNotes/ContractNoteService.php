<?php

namespace Anteris\Autotask\API\ContractNotes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractNotesEntity.htm Autotask documentation.
 */
class ContractNoteService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractnote.
     *
     * @param  ContractNoteEntity  $resource  The contractnote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractNoteEntity $resource)
    {
        $this->client->post("ContractNotes", $resource->toArray());
    }


    /**
     * Finds the ContractNote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractNoteEntity
    {
        return ContractNoteEntity::fromResponse(
            $this->client->get("ContractNotes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractNoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractNoteQueryBuilder
    {
        return new ContractNoteQueryBuilder($this->client);
    }

    /**
     * Updates the contractnote.
     *
     * @param  ContractNoteEntity  $resource  The contractnote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractNoteEntity $resource): void
    {
        $this->client->put("ContractNotes/$resource->id", $resource->toArray());
    }
}
