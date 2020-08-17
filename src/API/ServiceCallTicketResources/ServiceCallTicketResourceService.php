<?php

namespace Anteris\Autotask\API\ServiceCallTicketResources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ServiceCallTicketResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallTicketResourcesEntity.htm Autotask documentation.
 */
class ServiceCallTicketResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(ServiceCallTicketResourceEntity $resource)
    {
        $this->client->post("ServiceCallTicketResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ServiceCallTicketResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ServiceCallTicketResources/$id");
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
