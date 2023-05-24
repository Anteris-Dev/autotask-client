<?php

namespace Anteris\Autotask\API\ProjectNotes;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ProjectNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProjectNotesEntity.htm Autotask documentation.
 */
class ProjectNoteService
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
     * Creates a new projectnote.
     *
     * @param  ProjectNoteEntity  $resource  The projectnote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProjectNoteEntity $resource): Response
    {
        $projectID = $resource->projectID;
        return $this->client->post("Projects/$projectID/Notes", $resource->toArray());
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ProjectNotes/entityInformation/fields")
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
            $this->client->get("ProjectNotes/entityInformation")
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
    public function update(ProjectNoteEntity $resource): Response
    {
        $projectID = $resource->projectID;
        return $this->client->put("Projects/$projectID/Notes", $resource->toArray());
    }
}
