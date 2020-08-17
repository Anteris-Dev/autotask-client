<?php

namespace Anteris\Autotask\API\InternalLocationWithBusinessHours;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask InternalLocationWithBusinessHours.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InternalLocationWithBusinessHoursEntity.htm Autotask documentation.
 */
class InternalLocationWithBusinessHourService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new internallocationwithbusinesshour.
     *
     * @param  InternalLocationWithBusinessHourEntity  $resource  The internallocationwithbusinesshour entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(InternalLocationWithBusinessHourEntity $resource)
    {
        $this->client->post("InternalLocationWithBusinessHours", $resource->toArray());
    }


    /**
     * Finds the InternalLocationWithBusinessHour based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InternalLocationWithBusinessHourEntity
    {
        return InternalLocationWithBusinessHourEntity::fromResponse(
            $this->client->get("InternalLocationWithBusinessHours/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InternalLocationWithBusinessHourQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InternalLocationWithBusinessHourQueryBuilder
    {
        return new InternalLocationWithBusinessHourQueryBuilder($this->client);
    }

    /**
     * Updates the internallocationwithbusinesshour.
     *
     * @param  InternalLocationWithBusinessHourEntity  $resource  The internallocationwithbusinesshour entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InternalLocationWithBusinessHourEntity $resource): void
    {
        $this->client->put("InternalLocationWithBusinessHours/$resource->id", $resource->toArray());
    }
}
