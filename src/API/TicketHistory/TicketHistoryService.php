<?php

namespace Anteris\Autotask\API\TicketHistory;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketHistory.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketHistoryEntity.htm Autotask documentation.
 */
class TicketHistoryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the TicketHistory based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketHistoryEntity
    {
        return TicketHistoryEntity::fromResponse(
            $this->client->get("TicketHistory/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketHistoryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketHistoryQueryBuilder
    {
        return new TicketHistoryQueryBuilder($this->client);
    }

}
