<?php

namespace Anteris\Autotask\API\TicketCharges;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketCharges.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketChargesEntity.htm Autotask documentation.
 */
class TicketChargeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(TicketChargeEntity $resource)
    {
        $this->client->post("TicketCharges", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketCharge to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketCharges/$id");
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
    public function update(TicketChargeEntity $resource): void
    {
        $this->client->put("TicketCharges/$resource->id", $resource->toArray());
    }
}
