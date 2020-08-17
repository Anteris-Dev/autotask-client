<?php

namespace Anteris\Autotask\API\Phases;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Phases.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PhasesEntity.htm Autotask documentation.
 */
class PhaseService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(PhaseEntity $resource)
    {
        $this->client->post("Phases", $resource->toArray());
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
    public function update(PhaseEntity $resource): void
    {
        $this->client->put("Phases/$resource->id", $resource->toArray());
    }
}
