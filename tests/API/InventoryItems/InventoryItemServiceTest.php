<?php

use Anteris\Autotask\API\InventoryItems\InventoryItemCollection;
use Anteris\Autotask\API\InventoryItems\InventoryItemEntity;
use Anteris\Autotask\API\InventoryItems\InventoryItemService;
use Anteris\Autotask\API\InventoryItems\InventoryItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InventoryItemService.
 */
class InventoryItemServiceTest extends AbstractTest
{
    /**
     * @covers InventoryItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryItemService::class,
            $this->client->inventoryItems()
        );
    }

    /**
     * @covers InventoryItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->inventoryItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InventoryItemCollection::class,
            $result
        );
    }

    /**
     * @covers InventoryItemCollection
     */
    public function test_collection_contains_inventory_item_entities()
    {
        $result = $this->client->inventoryItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InventoryItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InventoryItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InventoryItemQueryBuilder::class,
            $this->client->inventoryItems()->query()
        );
    }
}
