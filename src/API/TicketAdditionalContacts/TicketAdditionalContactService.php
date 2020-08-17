<?php

namespace Anteris\Autotask\API\TicketAdditionalContacts;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketAdditionalContacts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketAdditionalContactsEntity.htm Autotask documentation.
 */
class TicketAdditionalContactService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketadditionalcontact.
     *
     * @param  TicketAdditionalContactEntity  $resource  The ticketadditionalcontact entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketAdditionalContactEntity $resource)
    {
        $this->client->post("TicketAdditionalContacts", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketAdditionalContact to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketAdditionalContacts/$id");
    }

    /**
     * Finds the TicketAdditionalContact based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketAdditionalContactEntity
    {
        return TicketAdditionalContactEntity::fromResponse(
            $this->client->get("TicketAdditionalContacts/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketAdditionalContactQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketAdditionalContactQueryBuilder
    {
        return new TicketAdditionalContactQueryBuilder($this->client);
    }

}
