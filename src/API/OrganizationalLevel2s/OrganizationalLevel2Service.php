<?php

namespace Anteris\Autotask\API\OrganizationalLevel2s;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask OrganizationalLevel2s.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/OrganizationalLevel2sEntity.htm Autotask documentation.
 */
class OrganizationalLevel2Service
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
     * Creates a new organizationallevel2.
     *
     * @param  OrganizationalLevel2Entity  $resource  The organizationallevel2 entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(OrganizationalLevel2Entity $resource): Response
    {
        return $this->client->post("OrganizationalLevel2s", $resource->toArray());
    }

    /**
     * Finds the OrganizationalLevel2 based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): OrganizationalLevel2Entity
    {
        return OrganizationalLevel2Entity::fromResponse(
            $this->client->get("OrganizationalLevel2s/$id")
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
            $this->client->get("OrganizationalLevel2s/entityInformation/fields")
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
            $this->client->get("OrganizationalLevel2s/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see OrganizationalLevel2QueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): OrganizationalLevel2QueryBuilder
    {
        return new OrganizationalLevel2QueryBuilder($this->client);
    }

    /**
     * Updates the organizationallevel2.
     *
     * @param  OrganizationalLevel2Entity  $resource  The organizationallevel2 entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(OrganizationalLevel2Entity $resource): Response
    {
        return $this->client->put("OrganizationalLevel2s", $resource->toArray());
    }
}
