<?php

namespace Anteris\Autotask\API\TicketAdditionalConfigurationItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketAdditionalConfigurationItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketAdditionalConfigurationItemsEntity.htm Autotask documentation.
 */
class TicketAdditionalConfigurationItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketadditionalconfigurationitem.
     *
     * @param  TicketAdditionalConfigurationItemEntity  $resource  The ticketadditionalconfigurationitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketAdditionalConfigurationItemEntity $resource)
    {
        $this->client->post("TicketAdditionalConfigurationItems", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketAdditionalConfigurationItem to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketAdditionalConfigurationItems/$id");
    }

    /**
     * Finds the TicketAdditionalConfigurationItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketAdditionalConfigurationItemEntity
    {
        return TicketAdditionalConfigurationItemEntity::fromResponse(
            $this->client->get("TicketAdditionalConfigurationItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketAdditionalConfigurationItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketAdditionalConfigurationItemQueryBuilder
    {
        return new TicketAdditionalConfigurationItemQueryBuilder($this->client);
    }

}
