<?php

use Anteris\Autotask\API\ConfigurationItemTypes\ConfigurationItemTypeCollection;
use Anteris\Autotask\API\ConfigurationItemTypes\ConfigurationItemTypeEntity;
use Anteris\Autotask\API\ConfigurationItemTypes\ConfigurationItemTypeService;
use Anteris\Autotask\API\ConfigurationItemTypes\ConfigurationItemTypeQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemTypeService.
 */
class ConfigurationItemTypeServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemTypeService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemTypeService::class,
            $this->client->configurationItemTypes()
        );
    }

    /**
     * @covers ConfigurationItemTypeService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->configurationItemTypes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ConfigurationItemTypeCollection::class,
            $result
        );
    }

    /**
     * @covers ConfigurationItemTypeCollection
     */
    public function test_collection_contains_configuration_item_type_entities()
    {
        $result = $this->client->configurationItemTypes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ConfigurationItemTypeEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ConfigurationItemTypeService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ConfigurationItemTypeQueryBuilder::class,
            $this->client->configurationItemTypes()->query()
        );
    }
}
