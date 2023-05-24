<?php

namespace Anteris\Autotask\API\OrganizationalLevelAssociations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask OrganizationalLevelAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/OrganizationalLevelAssociationsEntity.htm Autotask documentation.
 */
class OrganizationalLevelAssociationService
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
     * Creates a new organizationallevelassociation.
     *
     * @param  OrganizationalLevelAssociationEntity  $resource  The organizationallevelassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(OrganizationalLevelAssociationEntity $resource): Response
    {
        return $this->client->post("OrganizationalLevelAssociations", $resource->toArray());
    }

    /**
     * Finds the OrganizationalLevelAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): OrganizationalLevelAssociationEntity
    {
        return OrganizationalLevelAssociationEntity::fromResponse(
            $this->client->get("OrganizationalLevelAssociations/$id")
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
            $this->client->get("OrganizationalLevelAssociations/entityInformation/fields")
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
            $this->client->get("OrganizationalLevelAssociations/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see OrganizationalLevelAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): OrganizationalLevelAssociationQueryBuilder
    {
        return new OrganizationalLevelAssociationQueryBuilder($this->client);
    }

    /**
     * Updates the organizationallevelassociation.
     *
     * @param  OrganizationalLevelAssociationEntity  $resource  The organizationallevelassociation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(OrganizationalLevelAssociationEntity $resource): Response
    {
        return $this->client->put("OrganizationalLevelAssociations", $resource->toArray());
    }
}
