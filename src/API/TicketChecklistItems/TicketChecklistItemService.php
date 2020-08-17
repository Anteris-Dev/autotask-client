<?php

namespace Anteris\Autotask\API\TicketChecklistItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketChecklistItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketChecklistItemsEntity.htm Autotask documentation.
 */
class TicketChecklistItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketchecklistitem.
     *
     * @param  TicketChecklistItemEntity  $resource  The ticketchecklistitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketChecklistItemEntity $resource)
    {
        $this->client->post("TicketChecklistItems", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketChecklistItem to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketChecklistItems/$id");
    }

    /**
     * Finds the TicketChecklistItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketChecklistItemEntity
    {
        return TicketChecklistItemEntity::fromResponse(
            $this->client->get("TicketChecklistItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketChecklistItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketChecklistItemQueryBuilder
    {
        return new TicketChecklistItemQueryBuilder($this->client);
    }

    /**
     * Updates the ticketchecklistitem.
     *
     * @param  TicketChecklistItemEntity  $resource  The ticketchecklistitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketChecklistItemEntity $resource): void
    {
        $this->client->put("TicketChecklistItems/$resource->id", $resource->toArray());
    }
}
