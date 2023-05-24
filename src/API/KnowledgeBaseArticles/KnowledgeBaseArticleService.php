<?php

namespace Anteris\Autotask\API\KnowledgeBaseArticles;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask KnowledgeBaseArticles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/KnowledgeBaseArticlesEntity.htm Autotask documentation.
 */
class KnowledgeBaseArticleService
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
     * Creates a new knowledgebasearticle.
     *
     * @param  KnowledgeBaseArticleEntity  $resource  The knowledgebasearticle entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(KnowledgeBaseArticleEntity $resource): Response
    {
        return $this->client->post("KnowledgeBaseArticles", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the KnowledgeBaseArticle to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("KnowledgeBaseArticles/$id");
    }

    /**
     * Finds the KnowledgeBaseArticle based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): KnowledgeBaseArticleEntity
    {
        return KnowledgeBaseArticleEntity::fromResponse(
            $this->client->get("KnowledgeBaseArticles/$id")
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
            $this->client->get("KnowledgeBaseArticles/entityInformation/fields")
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
            $this->client->get("KnowledgeBaseArticles/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see KnowledgeBaseArticleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): KnowledgeBaseArticleQueryBuilder
    {
        return new KnowledgeBaseArticleQueryBuilder($this->client);
    }

    /**
     * Updates the knowledgebasearticle.
     *
     * @param  KnowledgeBaseArticleEntity  $resource  The knowledgebasearticle entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(KnowledgeBaseArticleEntity $resource): Response
    {
        return $this->client->put("KnowledgeBaseArticles", $resource->toArray());
    }
}
