<?php

namespace Anteris\Autotask\API\Tickets;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Tickets.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketsEntity.htm Autotask documentation.
 */
class TicketService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticket.
     *
     * @param  TicketEntity  $resource  The ticket entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketEntity $resource)
    {
        $this->client->post("Tickets", $resource->toArray());
    }


    /**
     * Finds the Ticket based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketEntity
    {
        return TicketEntity::fromResponse(
            $this->client->get("Tickets/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketQueryBuilder
    {
        return new TicketQueryBuilder($this->client);
    }

    /**
     * Updates the ticket.
     *
     * @param  TicketEntity  $resource  The ticket entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketEntity $resource): void
    {
        $this->client->put("Tickets/$resource->id", $resource->toArray());
    }
}
