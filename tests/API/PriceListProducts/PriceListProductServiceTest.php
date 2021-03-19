<?php

use Anteris\Autotask\API\PriceListProducts\PriceListProductCollection;
use Anteris\Autotask\API\PriceListProducts\PriceListProductEntity;
use Anteris\Autotask\API\PriceListProducts\PriceListProductService;
use Anteris\Autotask\API\PriceListProducts\PriceListProductQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PriceListProductService.
 */
class PriceListProductServiceTest extends AbstractTest
{
    /**
     * @covers PriceListProductService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PriceListProductService::class,
            $this->client->priceListProducts()
        );
    }

    /**
     * @covers PriceListProductService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->priceListProducts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PriceListProductCollection::class,
            $result
        );
    }

    /**
     * @covers PriceListProductCollection
     */
    public function test_collection_contains_price_list_product_entities()
    {
        $result = $this->client->priceListProducts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PriceListProductEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PriceListProductService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PriceListProductQueryBuilder::class,
            $this->client->priceListProducts()->query()
        );
    }
}
