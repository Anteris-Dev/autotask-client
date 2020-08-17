<?php

namespace Anteris\Autotask\API\Holidays;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Holidays.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/HolidaysEntity.htm Autotask documentation.
 */
class HolidayService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new holiday.
     *
     * @param  HolidayEntity  $resource  The holiday entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(HolidayEntity $resource)
    {
        $this->client->post("Holidays", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the Holiday to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("Holidays/$id");
    }

    /**
     * Finds the Holiday based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): HolidayEntity
    {
        return HolidayEntity::fromResponse(
            $this->client->get("Holidays/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see HolidayQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): HolidayQueryBuilder
    {
        return new HolidayQueryBuilder($this->client);
    }

    /**
     * Updates the holiday.
     *
     * @param  HolidayEntity  $resource  The holiday entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(HolidayEntity $resource): void
    {
        $this->client->put("Holidays/$resource->id", $resource->toArray());
    }
}
