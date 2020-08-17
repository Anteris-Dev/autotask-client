<?php

namespace Anteris\Autotask\API\ServiceCallTasks;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ServiceCallTasks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallTasksEntity.htm Autotask documentation.
 */
class ServiceCallTaskService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new servicecalltask.
     *
     * @param  ServiceCallTaskEntity  $resource  The servicecalltask entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceCallTaskEntity $resource)
    {
        $this->client->post("ServiceCallTasks", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ServiceCallTask to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ServiceCallTasks/$id");
    }

    /**
     * Finds the ServiceCallTask based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceCallTaskEntity
    {
        return ServiceCallTaskEntity::fromResponse(
            $this->client->get("ServiceCallTasks/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceCallTaskQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceCallTaskQueryBuilder
    {
        return new ServiceCallTaskQueryBuilder($this->client);
    }

}
