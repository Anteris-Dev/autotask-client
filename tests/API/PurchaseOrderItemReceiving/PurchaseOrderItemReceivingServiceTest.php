<?php

use Anteris\Autotask\API\PurchaseOrderItemReceiving\PurchaseOrderItemReceivingCollection;
use Anteris\Autotask\API\PurchaseOrderItemReceiving\PurchaseOrderItemReceivingEntity;
use Anteris\Autotask\API\PurchaseOrderItemReceiving\PurchaseOrderItemReceivingService;
use Anteris\Autotask\API\PurchaseOrderItemReceiving\PurchaseOrderItemReceivingQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PurchaseOrderItemReceivingService.
 */
class PurchaseOrderItemReceivingServiceTest extends AbstractTest
{
    /**
     * @covers PurchaseOrderItemReceivingService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PurchaseOrderItemReceivingService::class,
            $this->client->purchaseOrderItemReceiving()
        );
    }

    /**
     * @covers PurchaseOrderItemReceivingService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->purchaseOrderItemReceiving()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PurchaseOrderItemReceivingCollection::class,
            $result
        );
    }

    /**
     * @covers PurchaseOrderItemReceivingCollection
     */
    public function test_collection_contains_purchase_order_item_receiving_entities()
    {
        $result = $this->client->purchaseOrderItemReceiving()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PurchaseOrderItemReceivingEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PurchaseOrderItemReceivingService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PurchaseOrderItemReceivingQueryBuilder::class,
            $this->client->purchaseOrderItemReceiving()->query()
        );
    }
}
