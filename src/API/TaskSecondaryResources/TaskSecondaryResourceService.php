<?php

namespace Anteris\Autotask\API\TaskSecondaryResources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TaskSecondaryResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaskSecondaryResourcesEntity.htm Autotask documentation.
 */
class TaskSecondaryResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new tasksecondaryresource.
     *
     * @param  TaskSecondaryResourceEntity  $resource  The tasksecondaryresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaskSecondaryResourceEntity $resource)
    {
        $this->client->post("TaskSecondaryResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TaskSecondaryResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TaskSecondaryResources/$id");
    }

    /**
     * Finds the TaskSecondaryResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TaskSecondaryResourceEntity
    {
        return TaskSecondaryResourceEntity::fromResponse(
            $this->client->get("TaskSecondaryResources/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TaskSecondaryResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TaskSecondaryResourceQueryBuilder
    {
        return new TaskSecondaryResourceQueryBuilder($this->client);
    }

}
