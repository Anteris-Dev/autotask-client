<?php

namespace Anteris\Autotask\API\Departments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Departments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/DepartmentsEntity.htm Autotask documentation.
 */
class DepartmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new department.
     *
     * @param  DepartmentEntity  $resource  The department entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(DepartmentEntity $resource)
    {
        $this->client->post("Departments", $resource->toArray());
    }


    /**
     * Finds the Department based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): DepartmentEntity
    {
        return DepartmentEntity::fromResponse(
            $this->client->get("Departments/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see DepartmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): DepartmentQueryBuilder
    {
        return new DepartmentQueryBuilder($this->client);
    }

    /**
     * Updates the department.
     *
     * @param  DepartmentEntity  $resource  The department entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(DepartmentEntity $resource): void
    {
        $this->client->put("Departments/$resource->id", $resource->toArray());
    }
}
