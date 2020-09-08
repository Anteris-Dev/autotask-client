<?php

use Anteris\Autotask\API\InventoryLocations\InventoryLocationCollection;
use Anteris\Autotask\API\InventoryLocations\InventoryLocationEntity;
use Anteris\Autotask\API\InventoryLocations\InventoryLocationService;
use Anteris\Autotask\API\InventoryLocations\InventoryLocationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InventoryLocationService.
 */
class InventoryLocationServiceTest extends AbstractTest
{
    /**
     * @covers InventoryLocationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryLocationService::class,
            $this->client->inventoryLocations()
        );
    }

    /**
     * @covers InventoryLocationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->inventoryLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InventoryLocationCollection::class,
            $result
        );
    }

    /**
     * @covers InventoryLocationCollection
     */
    public function test_collection_contains_inventory_location_entities()
    {
        $result = $this->client->inventoryLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InventoryLocationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InventoryLocationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InventoryLocationQueryBuilder::class,
            $this->client->inventoryLocations()->query()
        );
    }
}
