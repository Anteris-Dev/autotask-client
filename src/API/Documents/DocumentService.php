<?php

namespace Anteris\Autotask\API\Documents;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Documents.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/DocumentsEntity.htm Autotask documentation.
 */
class DocumentService
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
     * Creates a new document.
     *
     * @param  DocumentEntity  $resource  The document entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(DocumentEntity $resource): Response
    {
        return $this->client->post("Documents", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the Document to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("Documents/$id");
    }

    /**
     * Finds the Document based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): DocumentEntity
    {
        return DocumentEntity::fromResponse(
            $this->client->get("Documents/$id")
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
            $this->client->get("Documents/entityInformation/fields")
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
            $this->client->get("Documents/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see DocumentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): DocumentQueryBuilder
    {
        return new DocumentQueryBuilder($this->client);
    }

    /**
     * Updates the document.
     *
     * @param  DocumentEntity  $resource  The document entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(DocumentEntity $resource): Response
    {
        return $this->client->put("Documents", $resource->toArray());
    }
}
