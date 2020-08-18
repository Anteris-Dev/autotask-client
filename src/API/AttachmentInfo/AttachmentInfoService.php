<?php

namespace Anteris\Autotask\API\AttachmentInfo;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask AttachmentInfo.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/AttachmentInfoEntity.htm Autotask documentation.
 */
class AttachmentInfoService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the AttachmentInfo based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): AttachmentInfoEntity
    {
        return AttachmentInfoEntity::fromResponse(
            $this->client->get("AttachmentInfo/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see AttachmentInfoQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): AttachmentInfoQueryBuilder
    {
        return new AttachmentInfoQueryBuilder($this->client);
    }

}
