<?php

use Anteris\Autotask\API\PriceListServiceBundles\PriceListServiceBundleCollection;
use Anteris\Autotask\API\PriceListServiceBundles\PriceListServiceBundleEntity;
use Anteris\Autotask\API\PriceListServiceBundles\PriceListServiceBundleService;
use Anteris\Autotask\API\PriceListServiceBundles\PriceListServiceBundleQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PriceListServiceBundleService.
 */
class PriceListServiceBundleServiceTest extends AbstractTest
{
    /**
     * @covers PriceListServiceBundleService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PriceListServiceBundleService::class,
            $this->client->priceListServiceBundles()
        );
    }

    /**
     * @covers PriceListServiceBundleService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->priceListServiceBundles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PriceListServiceBundleCollection::class,
            $result
        );
    }

    /**
     * @covers PriceListServiceBundleCollection
     */
    public function test_collection_contains_price_list_service_bundle_entities()
    {
        $result = $this->client->priceListServiceBundles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PriceListServiceBundleEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PriceListServiceBundleService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PriceListServiceBundleQueryBuilder::class,
            $this->client->priceListServiceBundles()->query()
        );
    }
}
