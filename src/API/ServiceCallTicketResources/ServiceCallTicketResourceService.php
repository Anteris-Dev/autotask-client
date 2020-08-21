<?php

namespace Anteris\Autotask\API\ServiceCallTicketResources;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ServiceCallTicketResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallTicketResourcesEntity.htm Autotask documentation.
 */
class ServiceCallTicketResourceService
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
     * Creates a new servicecallticketresource.
     *
     * @param  ServiceCallTicketResourceEntity  $resource  The servicecallticketresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceCallTicketResourceEntity $resource): Response
    {
        $serviceCallTicketID = $resource->serviceCallTicketID;
        return $this->client->post("ServiceCallTickets/$serviceCallTicketID/Resources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $serviceCallTicketID  ID of the ServiceCallTicketResource parent resource.
     * @param  int  $id  ID of the ServiceCallTicketResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $serviceCallTicketID,int $id): void
    {
        $this->client->delete("ServiceCallTickets/$serviceCallTicketID/Resources/$id");
    }

    /**
     * Finds the ServiceCallTicketResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceCallTicketResourceEntity
    {
        return ServiceCallTicketResourceEntity::fromResponse(
            $this->client->get("ServiceCallTicketResources/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceCallTicketResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceCallTicketResourceQueryBuilder
    {
        return new ServiceCallTicketResourceQueryBuilder($this->client);
    }

}
