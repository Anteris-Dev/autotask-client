<?php

namespace Anteris\Autotask\API\AttachmentNestedAttachments;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask AttachmentNestedAttachments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/AttachmentNestedAttachmentsEntity.htm Autotask documentation.
 */
class AttachmentNestedAttachmentService
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
     * Creates a new attachmentnestedattachment.
     *
     * @param  AttachmentNestedAttachmentEntity  $resource  The attachmentnestedattachment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(AttachmentNestedAttachmentEntity $resource): Response
    {
        $parentID = $resource->parentID;
        return $this->client->post("Attachments/$parentID/NestedAttachments", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $parentID  ID of the AttachmentNestedAttachment parent resource.
     * @param  int  $id  ID of the AttachmentNestedAttachment to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $parentID,int $id): void
    {
        $this->client->delete("Attachments/$parentID/NestedAttachments/$id");
    }

    /**
     * Finds the AttachmentNestedAttachment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): AttachmentNestedAttachmentEntity
    {
        return AttachmentNestedAttachmentEntity::fromResponse(
            $this->client->get("AttachmentNestedAttachments/$id")
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
            $this->client->get("AttachmentNestedAttachments/entityInformation/fields")
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
            $this->client->get("AttachmentNestedAttachments/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see AttachmentNestedAttachmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): AttachmentNestedAttachmentQueryBuilder
    {
        return new AttachmentNestedAttachmentQueryBuilder($this->client);
    }
}
