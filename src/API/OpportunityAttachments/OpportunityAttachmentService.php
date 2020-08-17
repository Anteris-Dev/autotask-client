<?php

namespace Anteris\Autotask\API\OpportunityAttachments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask OpportunityAttachments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/OpportunityAttachmentsEntity.htm Autotask documentation.
 */
class OpportunityAttachmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new opportunityattachment.
     *
     * @param  OpportunityAttachmentEntity  $resource  The opportunityattachment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(OpportunityAttachmentEntity $resource)
    {
        $this->client->post("OpportunityAttachments", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the OpportunityAttachment to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("OpportunityAttachments/$id");
    }

    /**
     * Finds the OpportunityAttachment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): OpportunityAttachmentEntity
    {
        return OpportunityAttachmentEntity::fromResponse(
            $this->client->get("OpportunityAttachments/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see OpportunityAttachmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): OpportunityAttachmentQueryBuilder
    {
        return new OpportunityAttachmentQueryBuilder($this->client);
    }

}
