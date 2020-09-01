<?php

use Anteris\Autotask\API\TaxCategories\TaxCategoryCollection;
use Anteris\Autotask\API\TaxCategories\TaxCategoryEntity;
use Anteris\Autotask\API\TaxCategories\TaxCategoryService;
use Anteris\Autotask\API\TaxCategories\TaxCategoryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaxCategoryService.
 */
class TaxCategoryServiceTest extends AbstractTest
{
    /**
     * @covers TaxCategoryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaxCategoryService::class,
            $this->client->taxCategories()
        );
    }

    /**
     * @covers TaxCategoryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->taxCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaxCategoryCollection::class,
            $result
        );
    }

    /**
     * @covers TaxCategoryCollection
     */
    public function test_collection_contains_tax_category_entities()
    {
        $result = $this->client->taxCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaxCategoryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaxCategoryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaxCategoryQueryBuilder::class,
            $this->client->taxCategories()->query()
        );
    }
}
