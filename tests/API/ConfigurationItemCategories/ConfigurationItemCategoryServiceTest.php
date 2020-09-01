<?php

use Anteris\Autotask\API\ConfigurationItemCategories\ConfigurationItemCategoryCollection;
use Anteris\Autotask\API\ConfigurationItemCategories\ConfigurationItemCategoryEntity;
use Anteris\Autotask\API\ConfigurationItemCategories\ConfigurationItemCategoryService;
use Anteris\Autotask\API\ConfigurationItemCategories\ConfigurationItemCategoryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemCategoryService.
 */
class ConfigurationItemCategoryServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemCategoryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemCategoryService::class,
            $this->client->configurationItemCategories()
        );
    }

    /**
     * @covers ConfigurationItemCategoryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->configurationItemCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ConfigurationItemCategoryCollection::class,
            $result
        );
    }

    /**
     * @covers ConfigurationItemCategoryCollection
     */
    public function test_collection_contains_configuration_item_category_entities()
    {
        $result = $this->client->configurationItemCategories()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ConfigurationItemCategoryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ConfigurationItemCategoryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ConfigurationItemCategoryQueryBuilder::class,
            $this->client->configurationItemCategories()->query()
        );
    }
}
