<?php

namespace Anteris\Autotask\API\Projects;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Projects.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProjectsEntity.htm Autotask documentation.
 */
class ProjectService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new project.
     *
     * @param  ProjectEntity  $resource  The project entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProjectEntity $resource)
    {
        $this->client->post("Projects", $resource->toArray());
    }


    /**
     * Finds the Project based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProjectEntity
    {
        return ProjectEntity::fromResponse(
            $this->client->get("Projects/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProjectQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProjectQueryBuilder
    {
        return new ProjectQueryBuilder($this->client);
    }

    /**
     * Updates the project.
     *
     * @param  ProjectEntity  $resource  The project entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ProjectEntity $resource): void
    {
        $this->client->put("Projects/$resource->id", $resource->toArray());
    }
}
