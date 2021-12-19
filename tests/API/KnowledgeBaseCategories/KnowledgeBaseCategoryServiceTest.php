<?php

use Anteris\Autotask\API\KnowledgeBaseCategories\KnowledgeBaseCategoryCollection;
use Anteris\Autotask\API\KnowledgeBaseCategories\KnowledgeBaseCategoryEntity;
use Anteris\Autotask\API\KnowledgeBaseCategories\KnowledgeBaseCategoryService;
use Anteris\Autotask\API\KnowledgeBaseCategories\KnowledgeBaseCategoryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for KnowledgeBaseCategoryService.
 */
class KnowledgeBaseCategoryServiceTest extends AbstractTest
{
    /**
     * @covers KnowledgeBaseCategoryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            KnowledgeBaseCategoryService::class,
            $this->client->knowledgeBaseCategories()
        );
    }

    /**
     * @covers KnowledgeBaseCategoryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->knowledgeBaseCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            KnowledgeBaseCategoryCollection::class,
            $result
        );
    }

    /**
     * @covers KnowledgeBaseCategoryCollection
     */
    public function test_collection_contains_knowledge_base_category_entities()
    {
        $result = $this->client->knowledgeBaseCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                KnowledgeBaseCategoryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers KnowledgeBaseCategoryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            KnowledgeBaseCategoryQueryBuilder::class,
            $this->client->knowledgeBaseCategories()->query()
        );
    }
}
