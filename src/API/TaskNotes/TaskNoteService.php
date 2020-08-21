<?php

namespace Anteris\Autotask\API\TaskNotes;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TaskNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaskNotesEntity.htm Autotask documentation.
 */
class TaskNoteService
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
     * Creates a new tasknote.
     *
     * @param  TaskNoteEntity  $resource  The tasknote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaskNoteEntity $resource): Response
    {
        $taskID = $resource->taskID;
        return $this->client->post("Tasks/$taskID/Notes", $resource->toArray());
    }

    /**
     * Finds the TaskNote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TaskNoteEntity
    {
        return TaskNoteEntity::fromResponse(
            $this->client->get("TaskNotes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TaskNoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TaskNoteQueryBuilder
    {
        return new TaskNoteQueryBuilder($this->client);
    }

    /**
     * Updates the tasknote.
     *
     * @param  TaskNoteEntity  $resource  The tasknote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TaskNoteEntity $resource): Response
    {
        $taskID = $resource->taskID;
        return $this->client->put("Tasks/$taskID/Notes", $resource->toArray());
    }
}
