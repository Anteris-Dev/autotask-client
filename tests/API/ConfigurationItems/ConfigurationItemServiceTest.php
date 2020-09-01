<?php

use Anteris\Autotask\API\ConfigurationItems\ConfigurationItemCollection;
use Anteris\Autotask\API\ConfigurationItems\ConfigurationItemEntity;
use Anteris\Autotask\API\ConfigurationItems\ConfigurationItemService;
use Anteris\Autotask\API\ConfigurationItems\ConfigurationItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemService.
 */
class ConfigurationItemServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemService::class,
            $this->client->configurationItems()
        );
    }

    /**
     * @covers ConfigurationItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->configurationItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ConfigurationItemCollection::class,
            $result
        );
    }

    /**
     * @covers ConfigurationItemCollection
     */
    public function test_collection_contains_configuration_item_entities()
    {
        $result = $this->client->configurationItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ConfigurationItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ConfigurationItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ConfigurationItemQueryBuilder::class,
            $this->client->configurationItems()->query()
        );
    }
}
