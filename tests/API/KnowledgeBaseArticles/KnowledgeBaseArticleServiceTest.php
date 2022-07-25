<?php

use Anteris\Autotask\API\KnowledgeBaseArticles\KnowledgeBaseArticleCollection;
use Anteris\Autotask\API\KnowledgeBaseArticles\KnowledgeBaseArticleEntity;
use Anteris\Autotask\API\KnowledgeBaseArticles\KnowledgeBaseArticleService;
use Anteris\Autotask\API\KnowledgeBaseArticles\KnowledgeBaseArticleQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for KnowledgeBaseArticleService.
 */
class KnowledgeBaseArticleServiceTest extends AbstractTest
{
    /**
     * @covers KnowledgeBaseArticleService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            KnowledgeBaseArticleService::class,
            $this->client->knowledgeBaseArticles()
        );
    }

    /**
     * @covers KnowledgeBaseArticleService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->knowledgeBaseArticles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            KnowledgeBaseArticleCollection::class,
            $result
        );
    }

    /**
     * @covers KnowledgeBaseArticleCollection
     */
    public function test_collection_contains_knowledge_base_article_entities()
    {
        $result = $this->client->knowledgeBaseArticles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                KnowledgeBaseArticleEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers KnowledgeBaseArticleService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            KnowledgeBaseArticleQueryBuilder::class,
            $this->client->knowledgeBaseArticles()->query()
        );
    }
}
