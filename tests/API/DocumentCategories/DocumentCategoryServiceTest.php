<?php

use Anteris\Autotask\API\DocumentCategories\DocumentCategoryCollection;
use Anteris\Autotask\API\DocumentCategories\DocumentCategoryEntity;
use Anteris\Autotask\API\DocumentCategories\DocumentCategoryService;
use Anteris\Autotask\API\DocumentCategories\DocumentCategoryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DocumentCategoryService.
 */
class DocumentCategoryServiceTest extends AbstractTest
{
    /**
     * @covers DocumentCategoryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DocumentCategoryService::class,
            $this->client->documentCategories()
        );
    }

    /**
     * @covers DocumentCategoryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->documentCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DocumentCategoryCollection::class,
            $result
        );
    }

    /**
     * @covers DocumentCategoryCollection
     */
    public function test_collection_contains_document_category_entities()
    {
        $result = $this->client->documentCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DocumentCategoryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DocumentCategoryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DocumentCategoryQueryBuilder::class,
            $this->client->documentCategories()->query()
        );
    }
}
