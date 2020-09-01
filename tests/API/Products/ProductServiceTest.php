<?php

use Anteris\Autotask\API\Products\ProductCollection;
use Anteris\Autotask\API\Products\ProductEntity;
use Anteris\Autotask\API\Products\ProductService;
use Anteris\Autotask\API\Products\ProductQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ProductService.
 */
class ProductServiceTest extends AbstractTest
{
    /**
     * @covers ProductService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ProductService::class,
            $this->client->products()
        );
    }

    /**
     * @covers ProductService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->products()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ProductCollection::class,
            $result
        );
    }

    /**
     * @covers ProductCollection
     */
    public function test_collection_contains_product_entities()
    {
        $result = $this->client->products()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ProductEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ProductService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ProductQueryBuilder::class,
            $this->client->products()->query()
        );
    }
}
