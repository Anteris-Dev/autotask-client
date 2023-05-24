<?php

namespace Anteris\Autotask\API\ServiceCallTasks;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ServiceCallTasks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallTasksEntity.htm Autotask documentation.
 */
class ServiceCallTaskService
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
     * Creates a new servicecalltask.
     *
     * @param  ServiceCallTaskEntity  $resource  The servicecalltask entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceCallTaskEntity $resource): Response
    {
        $serviceCallID = $resource->serviceCallID;
        return $this->client->post("ServiceCalls/$serviceCallID/Tasks", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $serviceCallID  ID of the ServiceCallTask parent resource.
     * @param  int  $id  ID of the ServiceCallTask to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $serviceCallID,int $id): void
    {
        $this->client->delete("ServiceCalls/$serviceCallID/Tasks/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ServiceCallTasks/entityInformation/fields")
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
            $this->client->get("ServiceCallTasks/entityInformation")
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
