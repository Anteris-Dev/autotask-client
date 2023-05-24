<?php

namespace Anteris\Autotask\API\TicketAdditionalContacts;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketAdditionalContacts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketAdditionalContactsEntity.htm Autotask documentation.
 */
class TicketAdditionalContactService
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
     * Creates a new ticketadditionalcontact.
     *
     * @param  TicketAdditionalContactEntity  $resource  The ticketadditionalcontact entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketAdditionalContactEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->post("Tickets/$ticketID/AdditionalContacts", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $ticketID  ID of the TicketAdditionalContact parent resource.
     * @param  int  $id  ID of the TicketAdditionalContact to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $ticketID,int $id): void
    {
        $this->client->delete("Tickets/$ticketID/AdditionalContacts/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("TicketAdditionalContacts/entityInformation/fields")
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
            $this->client->get("TicketAdditionalContacts/entityInformation")
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
