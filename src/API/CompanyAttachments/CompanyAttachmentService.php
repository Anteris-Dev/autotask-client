<?php

namespace Anteris\Autotask\API\CompanyAttachments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyAttachments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyAttachmentsEntity.htm Autotask documentation.
 */
class CompanyAttachmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new companyattachment.
     *
     * @param  CompanyAttachmentEntity  $resource  The companyattachment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyAttachmentEntity $resource)
    {
        $this->client->post("CompanyAttachments", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyAttachment to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyAttachments/$id");
    }

    /**
     * Finds the CompanyAttachment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyAttachmentEntity
    {
        return CompanyAttachmentEntity::fromResponse(
            $this->client->get("CompanyAttachments/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyAttachmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyAttachmentQueryBuilder
    {
        return new CompanyAttachmentQueryBuilder($this->client);
    }

}
