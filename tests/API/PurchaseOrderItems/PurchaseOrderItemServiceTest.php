<?php

use Anteris\Autotask\API\PurchaseOrderItems\PurchaseOrderItemCollection;
use Anteris\Autotask\API\PurchaseOrderItems\PurchaseOrderItemEntity;
use Anteris\Autotask\API\PurchaseOrderItems\PurchaseOrderItemService;
use Anteris\Autotask\API\PurchaseOrderItems\PurchaseOrderItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PurchaseOrderItemService.
 */
class PurchaseOrderItemServiceTest extends AbstractTest
{
    /**
     * @covers PurchaseOrderItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PurchaseOrderItemService::class,
            $this->client->purchaseOrderItems()
        );
    }

    /**
     * @covers PurchaseOrderItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->purchaseOrderItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PurchaseOrderItemCollection::class,
            $result
        );
    }

    /**
     * @covers PurchaseOrderItemCollection
     */
    public function test_collection_contains_purchase_order_item_entities()
    {
        $result = $this->client->purchaseOrderItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PurchaseOrderItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PurchaseOrderItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PurchaseOrderItemQueryBuilder::class,
            $this->client->purchaseOrderItems()->query()
        );
    }
}
