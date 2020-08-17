<?php

namespace Anteris\Autotask\API\CompanyToDos;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyToDos.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyToDosEntity.htm Autotask documentation.
 */
class CompanyToDoService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(CompanyToDoEntity $resource)
    {
        $this->client->post("CompanyToDos", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyToDo to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyToDos/$id");
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
    public function update(CompanyToDoEntity $resource): void
    {
        $this->client->put("CompanyToDos/$resource->id", $resource->toArray());
    }
}
