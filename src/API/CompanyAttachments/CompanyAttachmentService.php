<?php

namespace Anteris\Autotask\API\CompanyAttachments;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanyAttachments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyAttachmentsEntity.htm Autotask documentation.
 */
class CompanyAttachmentService
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
     * Creates a new companyattachment.
     *
     * @param  CompanyAttachmentEntity  $resource  The companyattachment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyAttachmentEntity $resource): Response
    {
        $parentID = $resource->parentID;
        return $this->client->post("Companies/$parentID/Attachments", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $parentID  ID of the CompanyAttachment parent resource.
     * @param  int  $id  ID of the CompanyAttachment to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $parentID,int $id): void
    {
        $this->client->delete("Companies/$parentID/Attachments/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("CompanyAttachments/entityInformation/fields")
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
            $this->client->get("CompanyAttachments/entityInformation")
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
