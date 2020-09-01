<?php

use Anteris\Autotask\API\InventoryTransfers\InventoryTransferCollection;
use Anteris\Autotask\API\InventoryTransfers\InventoryTransferEntity;
use Anteris\Autotask\API\InventoryTransfers\InventoryTransferService;
use Anteris\Autotask\API\InventoryTransfers\InventoryTransferQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InventoryTransferService.
 */
class InventoryTransferServiceTest extends AbstractTest
{
    /**
     * @covers InventoryTransferService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryTransferService::class,
            $this->client->inventoryTransfers()
        );
    }

    /**
     * @covers InventoryTransferService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->inventoryTransfers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InventoryTransferCollection::class,
            $result
        );
    }

    /**
     * @covers InventoryTransferCollection
     */
    public function test_collection_contains_inventory_transfer_entities()
    {
        $result = $this->client->inventoryTransfers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InventoryTransferEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InventoryTransferService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InventoryTransferQueryBuilder::class,
            $this->client->inventoryTransfers()->query()
        );
    }
}
