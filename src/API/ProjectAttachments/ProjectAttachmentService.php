<?php

namespace Anteris\Autotask\API\ProjectAttachments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ProjectAttachments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ProjectAttachmentsEntity.htm Autotask documentation.
 */
class ProjectAttachmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new projectattachment.
     *
     * @param  ProjectAttachmentEntity  $resource  The projectattachment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ProjectAttachmentEntity $resource)
    {
        $this->client->post("ProjectAttachments", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ProjectAttachment to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ProjectAttachments/$id");
    }

    /**
     * Finds the ProjectAttachment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ProjectAttachmentEntity
    {
        return ProjectAttachmentEntity::fromResponse(
            $this->client->get("ProjectAttachments/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ProjectAttachmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ProjectAttachmentQueryBuilder
    {
        return new ProjectAttachmentQueryBuilder($this->client);
    }

}
