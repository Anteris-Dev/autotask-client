<?php

namespace Anteris\Autotask\API\ProjectNotes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ProjectNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProjectNotesEntity.htm Autotask documentation.
 */
class ProjectNoteService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new projectnote.
     *
     * @param  ProjectNoteEntity  $resource  The projectnote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProjectNoteEntity $resource)
    {
        $this->client->post("ProjectNotes", $resource->toArray());
    }


    /**
     * Finds the ProjectNote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProjectNoteEntity
    {
        return ProjectNoteEntity::fromResponse(
            $this->client->get("ProjectNotes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProjectNoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProjectNoteQueryBuilder
    {
        return new ProjectNoteQueryBuilder($this->client);
    }

    /**
     * Updates the projectnote.
     *
     * @param  ProjectNoteEntity  $resource  The projectnote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ProjectNoteEntity $resource): void
    {
        $this->client->put("ProjectNotes/$resource->id", $resource->toArray());
    }
}
