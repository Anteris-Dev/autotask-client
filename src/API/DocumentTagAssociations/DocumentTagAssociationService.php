<?php

namespace Anteris\Autotask\API\DocumentTagAssociations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask DocumentTagAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/DocumentTagAssociationsEntity.htm Autotask documentation.
 */
class DocumentTagAssociationService
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
     * Creates a new documenttagassociation.
     *
     * @param  DocumentTagAssociationEntity  $resource  The documenttagassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(DocumentTagAssociationEntity $resource): Response
    {
        return $this->client->post("DocumentTagAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the DocumentTagAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("DocumentTagAssociations/$id");
    }

    /**
     * Finds the DocumentTagAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): DocumentTagAssociationEntity
    {
        return DocumentTagAssociationEntity::fromResponse(
            $this->client->get("DocumentTagAssociations/$id")
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
            $this->client->get("DocumentTagAssociations/entityInformation/fields")
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
            $this->client->get("DocumentTagAssociations/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see DocumentTagAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): DocumentTagAssociationQueryBuilder
    {
        return new DocumentTagAssociationQueryBuilder($this->client);
    }
}
