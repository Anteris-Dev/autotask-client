<?php

namespace Anteris\Autotask\API\TimeEntries;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TimeEntries.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TimeEntriesEntity.htm Autotask documentation.
 */
class TimeEntryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new timeentry.
     *
     * @param  TimeEntryEntity  $resource  The timeentry entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TimeEntryEntity $resource)
    {
        $this->client->post("TimeEntries", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TimeEntry to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TimeEntries/$id");
    }

    /**
     * Finds the TimeEntry based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TimeEntryEntity
    {
        return TimeEntryEntity::fromResponse(
            $this->client->get("TimeEntries/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TimeEntryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TimeEntryQueryBuilder
    {
        return new TimeEntryQueryBuilder($this->client);
    }

    /**
     * Updates the timeentry.
     *
     * @param  TimeEntryEntity  $resource  The timeentry entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TimeEntryEntity $resource): void
    {
        $this->client->put("TimeEntries/$resource->id", $resource->toArray());
    }
}
