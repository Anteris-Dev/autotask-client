<?php

use Anteris\Autotask\API\ConfigurationItemRelatedItems\ConfigurationItemRelatedItemCollection;
use Anteris\Autotask\API\ConfigurationItemRelatedItems\ConfigurationItemRelatedItemEntity;
use Anteris\Autotask\API\ConfigurationItemRelatedItems\ConfigurationItemRelatedItemService;
use Anteris\Autotask\API\ConfigurationItemRelatedItems\ConfigurationItemRelatedItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemRelatedItemService.
 */
class ConfigurationItemRelatedItemServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemRelatedItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemRelatedItemService::class,
            $this->client->configurationItemRelatedItems()
        );
    }

    /**
     * @covers ConfigurationItemRelatedItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->configurationItemRelatedItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ConfigurationItemRelatedItemCollection::class,
            $result
        );
    }

    /**
     * @covers ConfigurationItemRelatedItemCollection
     */
    public function test_collection_contains_configuration_item_related_item_entities()
    {
        $result = $this->client->configurationItemRelatedItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ConfigurationItemRelatedItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ConfigurationItemRelatedItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ConfigurationItemRelatedItemQueryBuilder::class,
            $this->client->configurationItemRelatedItems()->query()
        );
    }
}
