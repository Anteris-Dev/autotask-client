<?php

use Anteris\Autotask\API\SalesOrders\SalesOrderCollection;
use Anteris\Autotask\API\SalesOrders\SalesOrderEntity;
use Anteris\Autotask\API\SalesOrders\SalesOrderService;
use Anteris\Autotask\API\SalesOrders\SalesOrderQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for SalesOrderService.
 */
class SalesOrderServiceTest extends AbstractTest
{
    /**
     * @covers SalesOrderService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            SalesOrderService::class,
            $this->client->salesOrders()
        );
    }

    /**
     * @covers SalesOrderService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->salesOrders()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            SalesOrderCollection::class,
            $result
        );
    }

    /**
     * @covers SalesOrderCollection
     */
    public function test_collection_contains_sales_order_entities()
    {
        $result = $this->client->salesOrders()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                SalesOrderEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers SalesOrderService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            SalesOrderQueryBuilder::class,
            $this->client->salesOrders()->query()
        );
    }
}
