<?php

namespace Anteris\Autotask\API\Phases;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Phases.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PhasesEntity.htm Autotask documentation.
 */
class PhaseService
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
     * Creates a new phase.
     *
     * @param  PhaseEntity  $resource  The phase entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(PhaseEntity $resource): Response
    {
        $projectID = $resource->projectID;
        return $this->client->post("Projects/$projectID/Phases", $resource->toArray());
    }

    /**
     * Finds the Phase based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PhaseEntity
    {
        return PhaseEntity::fromResponse(
            $this->client->get("Phases/$id")
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
            $this->client->get("Phases/entityInformation/fields")
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
            $this->client->get("Phases/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PhaseQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PhaseQueryBuilder
    {
        return new PhaseQueryBuilder($this->client);
    }

    /**
     * Updates the phase.
     *
     * @param  PhaseEntity  $resource  The phase entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PhaseEntity $resource): Response
    {
        $projectID = $resource->projectID;
        return $this->client->put("Projects/$projectID/Phases", $resource->toArray());
    }
}
