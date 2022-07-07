<?php

use Anteris\Autotask\API\InventoryProducts\InventoryProductCollection;
use Anteris\Autotask\API\InventoryProducts\InventoryProductEntity;
use Anteris\Autotask\API\InventoryProducts\InventoryProductService;
use Anteris\Autotask\API\InventoryProducts\InventoryProductQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InventoryProductService.
 */
class InventoryProductServiceTest extends AbstractTest
{
    /**
     * @covers InventoryProductService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryProductService::class,
            $this->client->inventoryProducts()
        );
    }

    /**
     * @covers InventoryProductService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->inventoryProducts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InventoryProductCollection::class,
            $result
        );
    }

    /**
     * @covers InventoryProductCollection
     */
    public function test_collection_contains_inventory_product_entities()
    {
        $result = $this->client->inventoryProducts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InventoryProductEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InventoryProductService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InventoryProductQueryBuilder::class,
            $this->client->inventoryProducts()->query()
        );
    }
}
