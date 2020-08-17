<?php

namespace Anteris\Autotask\API\ClientPortalUsers;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ClientPortalUsers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ClientPortalUsersEntity.htm Autotask documentation.
 */
class ClientPortalUserService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new clientportaluser.
     *
     * @param  ClientPortalUserEntity  $resource  The clientportaluser entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ClientPortalUserEntity $resource)
    {
        $this->client->post("ClientPortalUsers", $resource->toArray());
    }


    /**
     * Finds the ClientPortalUser based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ClientPortalUserEntity
    {
        return ClientPortalUserEntity::fromResponse(
            $this->client->get("ClientPortalUsers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ClientPortalUserQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ClientPortalUserQueryBuilder
    {
        return new ClientPortalUserQueryBuilder($this->client);
    }

    /**
     * Updates the clientportaluser.
     *
     * @param  ClientPortalUserEntity  $resource  The clientportaluser entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ClientPortalUserEntity $resource): void
    {
        $this->client->put("ClientPortalUsers/$resource->id", $resource->toArray());
    }
}
