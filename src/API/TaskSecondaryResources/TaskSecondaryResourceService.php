<?php

namespace Anteris\Autotask\API\TaskSecondaryResources;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TaskSecondaryResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaskSecondaryResourcesEntity.htm Autotask documentation.
 */
class TaskSecondaryResourceService
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
     * Creates a new tasksecondaryresource.
     *
     * @param  TaskSecondaryResourceEntity  $resource  The tasksecondaryresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaskSecondaryResourceEntity $resource): Response
    {
        $taskID = $resource->taskID;
        return $this->client->post("Tasks/$taskID/SecondaryResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $taskID  ID of the TaskSecondaryResource parent resource.
     * @param  int  $id  ID of the TaskSecondaryResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $taskID,int $id): void
    {
        $this->client->delete("Tasks/$taskID/SecondaryResources/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("TaskSecondaryResources/entityInformation/fields")
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
            $this->client->get("TaskSecondaryResources/entityInformation")
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
