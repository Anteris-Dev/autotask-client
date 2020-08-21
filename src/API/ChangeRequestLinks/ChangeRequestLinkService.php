<?php

namespace Anteris\Autotask\API\ChangeRequestLinks;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ChangeRequestLinks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ChangeRequestLinksEntity.htm Autotask documentation.
 */
class ChangeRequestLinkService
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
     * Creates a new changerequestlink.
     *
     * @param  ChangeRequestLinkEntity  $resource  The changerequestlink entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ChangeRequestLinkEntity $resource): Response
    {
        return $this->client->post("ChangeRequestLinks", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ChangeRequestLink to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ChangeRequestLinks/$id");
    }

    /**
     * Finds the ChangeRequestLink based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ChangeRequestLinkEntity
    {
        return ChangeRequestLinkEntity::fromResponse(
            $this->client->get("ChangeRequestLinks/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ChangeRequestLinkQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ChangeRequestLinkQueryBuilder
    {
        return new ChangeRequestLinkQueryBuilder($this->client);
    }

}
