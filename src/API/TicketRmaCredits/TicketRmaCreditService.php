<?php

namespace Anteris\Autotask\API\TicketRmaCredits;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketRmaCredits.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketRmaCreditsEntity.htm Autotask documentation.
 */
class TicketRmaCreditService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketrmacredit.
     *
     * @param  TicketRmaCreditEntity  $resource  The ticketrmacredit entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketRmaCreditEntity $resource)
    {
        $this->client->post("TicketRmaCredits", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketRmaCredit to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketRmaCredits/$id");
    }

    /**
     * Finds the TicketRmaCredit based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketRmaCreditEntity
    {
        return TicketRmaCreditEntity::fromResponse(
            $this->client->get("TicketRmaCredits/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketRmaCreditQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketRmaCreditQueryBuilder
    {
        return new TicketRmaCreditQueryBuilder($this->client);
    }

    /**
     * Updates the ticketrmacredit.
     *
     * @param  TicketRmaCreditEntity  $resource  The ticketrmacredit entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketRmaCreditEntity $resource): void
    {
        $this->client->put("TicketRmaCredits/$resource->id", $resource->toArray());
    }
}
