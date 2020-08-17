<?php

namespace Anteris\Autotask\API\TicketChangeRequestApprovals;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketChangeRequestApprovals.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketChangeRequestApprovalsEntity.htm Autotask documentation.
 */
class TicketChangeRequestApprovalService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketchangerequestapproval.
     *
     * @param  TicketChangeRequestApprovalEntity  $resource  The ticketchangerequestapproval entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketChangeRequestApprovalEntity $resource)
    {
        $this->client->post("TicketChangeRequestApprovals", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketChangeRequestApproval to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketChangeRequestApprovals/$id");
    }

    /**
     * Finds the TicketChangeRequestApproval based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketChangeRequestApprovalEntity
    {
        return TicketChangeRequestApprovalEntity::fromResponse(
            $this->client->get("TicketChangeRequestApprovals/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketChangeRequestApprovalQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketChangeRequestApprovalQueryBuilder
    {
        return new TicketChangeRequestApprovalQueryBuilder($this->client);
    }

}
