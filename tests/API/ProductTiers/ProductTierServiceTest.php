<?php

use Anteris\Autotask\API\ProductTiers\ProductTierCollection;
use Anteris\Autotask\API\ProductTiers\ProductTierEntity;
use Anteris\Autotask\API\ProductTiers\ProductTierService;
use Anteris\Autotask\API\ProductTiers\ProductTierQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ProductTierService.
 */
class ProductTierServiceTest extends AbstractTest
{
    /**
     * @covers ProductTierService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ProductTierService::class,
            $this->client->productTiers()
        );
    }

    /**
     * @covers ProductTierService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->productTiers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ProductTierCollection::class,
            $result
        );
    }

    /**
     * @covers ProductTierCollection
     */
    public function test_collection_contains_product_tier_entities()
    {
        $result = $this->client->productTiers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ProductTierEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ProductTierService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ProductTierQueryBuilder::class,
            $this->client->productTiers()->query()
        );
    }
}
