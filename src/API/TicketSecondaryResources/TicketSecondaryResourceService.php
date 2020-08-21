<?php

namespace Anteris\Autotask\API\TicketSecondaryResources;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketSecondaryResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketSecondaryResourcesEntity.htm Autotask documentation.
 */
class TicketSecondaryResourceService
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
     * Creates a new ticketsecondaryresource.
     *
     * @param  TicketSecondaryResourceEntity  $resource  The ticketsecondaryresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketSecondaryResourceEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->post("Tickets/$ticketID/SecondaryResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $ticketID  ID of the TicketSecondaryResource parent resource.
     * @param  int  $id  ID of the TicketSecondaryResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $ticketID,int $id): void
    {
        $this->client->delete("Tickets/$ticketID/SecondaryResources/$id");
    }

    /**
     * Finds the TicketSecondaryResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketSecondaryResourceEntity
    {
        return TicketSecondaryResourceEntity::fromResponse(
            $this->client->get("TicketSecondaryResources/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketSecondaryResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketSecondaryResourceQueryBuilder
    {
        return new TicketSecondaryResourceQueryBuilder($this->client);
    }

}
