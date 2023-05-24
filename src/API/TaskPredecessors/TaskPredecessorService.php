<?php

namespace Anteris\Autotask\API\TaskPredecessors;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TaskPredecessors.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaskPredecessorsEntity.htm Autotask documentation.
 */
class TaskPredecessorService
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
     * Creates a new taskpredecessor.
     *
     * @param  TaskPredecessorEntity  $resource  The taskpredecessor entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaskPredecessorEntity $resource): Response
    {
        $taskID = $resource->taskID;
        return $this->client->post("Tasks/$taskID/Predecessors", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $taskID  ID of the TaskPredecessor parent resource.
     * @param  int  $id  ID of the TaskPredecessor to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $taskID,int $id): void
    {
        $this->client->delete("Tasks/$taskID/Predecessors/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("TaskPredecessors/entityInformation/fields")
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
            $this->client->get("TaskPredecessors/entityInformation")
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
    public function update(TaskPredecessorEntity $resource): Response
    {
        $taskID = $resource->taskID;
        return $this->client->put("Tasks/$taskID/Predecessors", $resource->toArray());
    }
}
