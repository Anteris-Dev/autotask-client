<?php

namespace Anteris\Autotask\API\TicketChangeRequestApprovals;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketChangeRequestApprovals.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketChangeRequestApprovalsEntity.htm Autotask documentation.
 */
class TicketChangeRequestApprovalService
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
     * Creates a new ticketchangerequestapproval.
     *
     * @param  TicketChangeRequestApprovalEntity  $resource  The ticketchangerequestapproval entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketChangeRequestApprovalEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->post("Tickets/$ticketID/ChangeRequestApprovals", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $ticketID  ID of the TicketChangeRequestApproval parent resource.
     * @param  int  $id  ID of the TicketChangeRequestApproval to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $ticketID,int $id): void
    {
        $this->client->delete("Tickets/$ticketID/ChangeRequestApprovals/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("TicketChangeRequestApprovals/entityInformation/fields")
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
            $this->client->get("TicketChangeRequestApprovals/entityInformation")
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
