<?php

namespace Anteris\Autotask\API\ProjectCharges;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ProjectCharges.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProjectChargesEntity.htm Autotask documentation.
 */
class ProjectChargeService
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
     * Creates a new projectcharge.
     *
     * @param  ProjectChargeEntity  $resource  The projectcharge entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProjectChargeEntity $resource): Response
    {
        $projectID = $resource->projectID;
        return $this->client->post("Projects/$projectID/Charges", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $projectID  ID of the ProjectCharge parent resource.
     * @param  int  $id  ID of the ProjectCharge to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $projectID,int $id): void
    {
        $this->client->delete("Projects/$projectID/Charges/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ProjectCharges/entityInformation/fields")
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
            $this->client->get("ProjectCharges/entityInformation")
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
    public function update(ProjectChargeEntity $resource): Response
    {
        $projectID = $resource->projectID;
        return $this->client->put("Projects/$projectID/Charges", $resource->toArray());
    }
}
