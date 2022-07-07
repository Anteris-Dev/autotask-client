<?php

use Anteris\Autotask\API\InventoryStockedItems\InventoryStockedItemCollection;
use Anteris\Autotask\API\InventoryStockedItems\InventoryStockedItemEntity;
use Anteris\Autotask\API\InventoryStockedItems\InventoryStockedItemService;
use Anteris\Autotask\API\InventoryStockedItems\InventoryStockedItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InventoryStockedItemService.
 */
class InventoryStockedItemServiceTest extends AbstractTest
{
    /**
     * @covers InventoryStockedItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryStockedItemService::class,
            $this->client->inventoryStockedItems()
        );
    }

    /**
     * @covers InventoryStockedItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->inventoryStockedItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InventoryStockedItemCollection::class,
            $result
        );
    }

    /**
     * @covers InventoryStockedItemCollection
     */
    public function test_collection_contains_inventory_stocked_item_entities()
    {
        $result = $this->client->inventoryStockedItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InventoryStockedItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InventoryStockedItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InventoryStockedItemQueryBuilder::class,
            $this->client->inventoryStockedItems()->query()
        );
    }
}
