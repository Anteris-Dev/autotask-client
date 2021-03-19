<?php

use Anteris\Autotask\API\PriceListProductTiers\PriceListProductTierCollection;
use Anteris\Autotask\API\PriceListProductTiers\PriceListProductTierEntity;
use Anteris\Autotask\API\PriceListProductTiers\PriceListProductTierService;
use Anteris\Autotask\API\PriceListProductTiers\PriceListProductTierQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PriceListProductTierService.
 */
class PriceListProductTierServiceTest extends AbstractTest
{
    /**
     * @covers PriceListProductTierService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PriceListProductTierService::class,
            $this->client->priceListProductTiers()
        );
    }

    /**
     * @covers PriceListProductTierService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->priceListProductTiers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PriceListProductTierCollection::class,
            $result
        );
    }

    /**
     * @covers PriceListProductTierCollection
     */
    public function test_collection_contains_price_list_product_tier_entities()
    {
        $result = $this->client->priceListProductTiers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PriceListProductTierEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PriceListProductTierService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PriceListProductTierQueryBuilder::class,
            $this->client->priceListProductTiers()->query()
        );
    }
}
