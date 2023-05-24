<?php

namespace Anteris\Autotask\API\TicketChecklistItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketChecklistItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketChecklistItemsEntity.htm Autotask documentation.
 */
class TicketChecklistItemService
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
     * Creates a new ticketchecklistitem.
     *
     * @param  TicketChecklistItemEntity  $resource  The ticketchecklistitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketChecklistItemEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->post("Tickets/$ticketID/ChecklistItems", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $ticketID  ID of the TicketChecklistItem parent resource.
     * @param  int  $id  ID of the TicketChecklistItem to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $ticketID,int $id): void
    {
        $this->client->delete("Tickets/$ticketID/ChecklistItems/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("TicketChecklistItems/entityInformation/fields")
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
            $this->client->get("TicketChecklistItems/entityInformation")
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
    public function update(TicketChecklistItemEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->put("Tickets/$ticketID/ChecklistItems", $resource->toArray());
    }
}
