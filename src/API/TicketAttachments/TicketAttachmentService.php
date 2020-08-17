<?php

namespace Anteris\Autotask\API\TicketAttachments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketAttachments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketAttachmentsEntity.htm Autotask documentation.
 */
class TicketAttachmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketattachment.
     *
     * @param  TicketAttachmentEntity  $resource  The ticketattachment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketAttachmentEntity $resource)
    {
        $this->client->post("TicketAttachments", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketAttachment to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketAttachments/$id");
    }

    /**
     * Finds the TicketAttachment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketAttachmentEntity
    {
        return TicketAttachmentEntity::fromResponse(
            $this->client->get("TicketAttachments/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketAttachmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketAttachmentQueryBuilder
    {
        return new TicketAttachmentQueryBuilder($this->client);
    }

}
