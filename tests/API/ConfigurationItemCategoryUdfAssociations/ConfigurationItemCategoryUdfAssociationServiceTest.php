<?php

use Anteris\Autotask\API\ConfigurationItemCategoryUdfAssociations\ConfigurationItemCategoryUdfAssociationCollection;
use Anteris\Autotask\API\ConfigurationItemCategoryUdfAssociations\ConfigurationItemCategoryUdfAssociationEntity;
use Anteris\Autotask\API\ConfigurationItemCategoryUdfAssociations\ConfigurationItemCategoryUdfAssociationService;
use Anteris\Autotask\API\ConfigurationItemCategoryUdfAssociations\ConfigurationItemCategoryUdfAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemCategoryUdfAssociationService.
 */
class ConfigurationItemCategoryUdfAssociationServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemCategoryUdfAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemCategoryUdfAssociationService::class,
            $this->client->configurationItemCategoryUdfAssociations()
        );
    }

    /**
     * @covers ConfigurationItemCategoryUdfAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->configurationItemCategoryUdfAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ConfigurationItemCategoryUdfAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers ConfigurationItemCategoryUdfAssociationCollection
     */
    public function test_collection_contains_configuration_item_category_udf_association_entities()
    {
        $result = $this->client->configurationItemCategoryUdfAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ConfigurationItemCategoryUdfAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ConfigurationItemCategoryUdfAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ConfigurationItemCategoryUdfAssociationQueryBuilder::class,
            $this->client->configurationItemCategoryUdfAssociations()->query()
        );
    }
}
