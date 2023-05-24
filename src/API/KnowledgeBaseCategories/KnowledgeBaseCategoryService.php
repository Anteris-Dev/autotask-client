<?php

namespace Anteris\Autotask\API\KnowledgeBaseCategories;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask KnowledgeBaseCategories.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/KnowledgeBaseCategoriesEntity.htm Autotask documentation.
 */
class KnowledgeBaseCategoryService
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
     * Creates a new knowledgebasecategory.
     *
     * @param  KnowledgeBaseCategoryEntity  $resource  The knowledgebasecategory entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(KnowledgeBaseCategoryEntity $resource): Response
    {
        return $this->client->post("KnowledgeBaseCategories", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the KnowledgeBaseCategory to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("KnowledgeBaseCategories/$id");
    }

    /**
     * Finds the KnowledgeBaseCategory based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): KnowledgeBaseCategoryEntity
    {
        return KnowledgeBaseCategoryEntity::fromResponse(
            $this->client->get("KnowledgeBaseCategories/$id")
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
            $this->client->get("KnowledgeBaseCategories/entityInformation/fields")
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
            $this->client->get("KnowledgeBaseCategories/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see KnowledgeBaseCategoryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): KnowledgeBaseCategoryQueryBuilder
    {
        return new KnowledgeBaseCategoryQueryBuilder($this->client);
    }

    /**
     * Updates the knowledgebasecategory.
     *
     * @param  KnowledgeBaseCategoryEntity  $resource  The knowledgebasecategory entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(KnowledgeBaseCategoryEntity $resource): Response
    {
        return $this->client->put("KnowledgeBaseCategories", $resource->toArray());
    }
}
