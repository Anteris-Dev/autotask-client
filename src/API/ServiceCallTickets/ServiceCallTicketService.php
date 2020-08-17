<?php

namespace Anteris\Autotask\API\ServiceCallTickets;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ServiceCallTickets.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallTicketsEntity.htm Autotask documentation.
 */
class ServiceCallTicketService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new servicecallticket.
     *
     * @param  ServiceCallTicketEntity  $resource  The servicecallticket entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceCallTicketEntity $resource)
    {
        $this->client->post("ServiceCallTickets", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ServiceCallTicket to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ServiceCallTickets/$id");
    }

    /**
     * Finds the ServiceCallTicket based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceCallTicketEntity
    {
        return ServiceCallTicketEntity::fromResponse(
            $this->client->get("ServiceCallTickets/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceCallTicketQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceCallTicketQueryBuilder
    {
        return new ServiceCallTicketQueryBuilder($this->client);
    }

}
