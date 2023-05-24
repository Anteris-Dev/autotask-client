<?php

namespace Anteris\Autotask\API\ServiceCallTickets;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ServiceCallTickets.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallTicketsEntity.htm Autotask documentation.
 */
class ServiceCallTicketService
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
     * Creates a new servicecallticket.
     *
     * @param  ServiceCallTicketEntity  $resource  The servicecallticket entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceCallTicketEntity $resource): Response
    {
        $serviceCallID = $resource->serviceCallID;
        return $this->client->post("ServiceCalls/$serviceCallID/Tickets", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $serviceCallID  ID of the ServiceCallTicket parent resource.
     * @param  int  $id  ID of the ServiceCallTicket to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $serviceCallID,int $id): void
    {
        $this->client->delete("ServiceCalls/$serviceCallID/Tickets/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ServiceCallTickets/entityInformation/fields")
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
            $this->client->get("ServiceCallTickets/entityInformation")
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
