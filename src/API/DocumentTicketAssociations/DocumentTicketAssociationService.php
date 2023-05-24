<?php

namespace Anteris\Autotask\API\DocumentTicketAssociations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask DocumentTicketAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/DocumentTicketAssociationsEntity.htm Autotask documentation.
 */
class DocumentTicketAssociationService
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
     * Creates a new documentticketassociation.
     *
     * @param  DocumentTicketAssociationEntity  $resource  The documentticketassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(DocumentTicketAssociationEntity $resource): Response
    {
        return $this->client->post("DocumentTicketAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the DocumentTicketAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("DocumentTicketAssociations/$id");
    }

    /**
     * Finds the DocumentTicketAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): DocumentTicketAssociationEntity
    {
        return DocumentTicketAssociationEntity::fromResponse(
            $this->client->get("DocumentTicketAssociations/$id")
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
            $this->client->get("DocumentTicketAssociations/entityInformation/fields")
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
            $this->client->get("DocumentTicketAssociations/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see DocumentTicketAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): DocumentTicketAssociationQueryBuilder
    {
        return new DocumentTicketAssociationQueryBuilder($this->client);
    }
}
