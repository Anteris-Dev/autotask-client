<?php

namespace Anteris\Autotask\API\ComanagedAssociations;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ComanagedAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ComanagedAssociationsEntity.htm Autotask documentation.
 */
class ComanagedAssociationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new comanagedassociation.
     *
     * @param  ComanagedAssociationEntity  $resource  The comanagedassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ComanagedAssociationEntity $resource)
    {
        $this->client->post("ComanagedAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ComanagedAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ComanagedAssociations/$id");
    }

    /**
     * Finds the ComanagedAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ComanagedAssociationEntity
    {
        return ComanagedAssociationEntity::fromResponse(
            $this->client->get("ComanagedAssociations/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ComanagedAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ComanagedAssociationQueryBuilder
    {
        return new ComanagedAssociationQueryBuilder($this->client);
    }

}
