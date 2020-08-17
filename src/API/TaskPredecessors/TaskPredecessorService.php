<?php

namespace Anteris\Autotask\API\TaskPredecessors;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TaskPredecessors.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaskPredecessorsEntity.htm Autotask documentation.
 */
class TaskPredecessorService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new taskpredecessor.
     *
     * @param  TaskPredecessorEntity  $resource  The taskpredecessor entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaskPredecessorEntity $resource)
    {
        $this->client->post("TaskPredecessors", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TaskPredecessor to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TaskPredecessors/$id");
    }

    /**
     * Finds the TaskPredecessor based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TaskPredecessorEntity
    {
        return TaskPredecessorEntity::fromResponse(
            $this->client->get("TaskPredecessors/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TaskPredecessorQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TaskPredecessorQueryBuilder
    {
        return new TaskPredecessorQueryBuilder($this->client);
    }

    /**
     * Updates the taskpredecessor.
     *
     * @param  TaskPredecessorEntity  $resource  The taskpredecessor entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TaskPredecessorEntity $resource): void
    {
        $this->client->put("TaskPredecessors/$resource->id", $resource->toArray());
    }
}
