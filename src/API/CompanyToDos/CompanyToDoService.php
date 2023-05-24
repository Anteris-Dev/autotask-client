<?php

namespace Anteris\Autotask\API\CompanyToDos;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanyToDos.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyToDosEntity.htm Autotask documentation.
 */
class CompanyToDoService
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
     * Creates a new companytodo.
     *
     * @param  CompanyToDoEntity  $resource  The companytodo entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyToDoEntity $resource): Response
    {
        $companyID = $resource->companyID;
        return $this->client->post("Companies/$companyID/ToDos", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $companyID  ID of the CompanyToDo parent resource.
     * @param  int  $id  ID of the CompanyToDo to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $companyID,int $id): void
    {
        $this->client->delete("Companies/$companyID/ToDos/$id");
    }

    /**
     * Finds the CompanyToDo based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyToDoEntity
    {
        return CompanyToDoEntity::fromResponse(
            $this->client->get("CompanyToDos/$id")
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
            $this->client->get("CompanyToDos/entityInformation/fields")
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
            $this->client->get("CompanyToDos/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyToDoQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyToDoQueryBuilder
    {
        return new CompanyToDoQueryBuilder($this->client);
    }

    /**
     * Updates the companytodo.
     *
     * @param  CompanyToDoEntity  $resource  The companytodo entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyToDoEntity $resource): Response
    {
        $companyID = $resource->companyID;
        return $this->client->put("Companies/$companyID/ToDos", $resource->toArray());
    }
}
