<?php

namespace Anteris\Autotask\API\TicketSecondaryResources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketSecondaryResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketSecondaryResourcesEntity.htm Autotask documentation.
 */
class TicketSecondaryResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(TicketSecondaryResourceEntity $resource)
    {
        $this->client->post("TicketSecondaryResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketSecondaryResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketSecondaryResources/$id");
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
