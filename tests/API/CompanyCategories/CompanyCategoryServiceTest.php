<?php

use Anteris\Autotask\API\CompanyCategories\CompanyCategoryCollection;
use Anteris\Autotask\API\CompanyCategories\CompanyCategoryEntity;
use Anteris\Autotask\API\CompanyCategories\CompanyCategoryService;
use Anteris\Autotask\API\CompanyCategories\CompanyCategoryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyCategoryService.
 */
class CompanyCategoryServiceTest extends AbstractTest
{
    /**
     * @covers CompanyCategoryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyCategoryService::class,
            $this->client->companyCategories()
        );
    }

    /**
     * @covers CompanyCategoryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->companyCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CompanyCategoryCollection::class,
            $result
        );
    }

    /**
     * @covers CompanyCategoryCollection
     */
    public function test_collection_contains_company_category_entities()
    {
        $result = $this->client->companyCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CompanyCategoryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CompanyCategoryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CompanyCategoryQueryBuilder::class,
            $this->client->companyCategories()->query()
        );
    }
}
