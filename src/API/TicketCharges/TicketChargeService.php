<?php

namespace Anteris\Autotask\API\TicketCharges;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketCharges.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketChargesEntity.htm Autotask documentation.
 */
class TicketChargeService
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
     * Creates a new ticketcharge.
     *
     * @param  TicketChargeEntity  $resource  The ticketcharge entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketChargeEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->post("Tickets/$ticketID/Charges", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $ticketID  ID of the TicketCharge parent resource.
     * @param  int  $id  ID of the TicketCharge to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $ticketID,int $id): void
    {
        $this->client->delete("Tickets/$ticketID/Charges/$id");
    }

    /**
     * Finds the TicketCharge based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketChargeEntity
    {
        return TicketChargeEntity::fromResponse(
            $this->client->get("TicketCharges/$id")
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
            $this->client->get("TicketCharges/entityInformation/fields")
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
            $this->client->get("TicketCharges/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketChargeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketChargeQueryBuilder
    {
        return new TicketChargeQueryBuilder($this->client);
    }

    /**
     * Updates the ticketcharge.
     *
     * @param  TicketChargeEntity  $resource  The ticketcharge entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketChargeEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->put("Tickets/$ticketID/Charges", $resource->toArray());
    }
}
