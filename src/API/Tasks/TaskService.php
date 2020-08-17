<?php

namespace Anteris\Autotask\API\Tasks;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Tasks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TasksEntity.htm Autotask documentation.
 */
class TaskService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new task.
     *
     * @param  TaskEntity  $resource  The task entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaskEntity $resource)
    {
        $this->client->post("Tasks", $resource->toArray());
    }


    /**
     * Finds the Task based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TaskEntity
    {
        return TaskEntity::fromResponse(
            $this->client->get("Tasks/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TaskQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TaskQueryBuilder
    {
        return new TaskQueryBuilder($this->client);
    }

    /**
     * Updates the task.
     *
     * @param  TaskEntity  $resource  The task entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TaskEntity $resource): void
    {
        $this->client->put("Tasks/$resource->id", $resource->toArray());
    }
}
