<?php

namespace Anteris\Autotask\API\ProjectCharges;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ProjectCharges.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProjectChargesEntity.htm Autotask documentation.
 */
class ProjectChargeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new projectcharge.
     *
     * @param  ProjectChargeEntity  $resource  The projectcharge entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProjectChargeEntity $resource)
    {
        $this->client->post("ProjectCharges", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ProjectCharge to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ProjectCharges/$id");
    }

    /**
     * Finds the ProjectCharge based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProjectChargeEntity
    {
        return ProjectChargeEntity::fromResponse(
            $this->client->get("ProjectCharges/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProjectChargeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProjectChargeQueryBuilder
    {
        return new ProjectChargeQueryBuilder($this->client);
    }

    /**
     * Updates the projectcharge.
     *
     * @param  ProjectChargeEntity  $resource  The projectcharge entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ProjectChargeEntity $resource): void
    {
        $this->client->put("ProjectCharges/$resource->id", $resource->toArray());
    }
}
