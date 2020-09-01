<?php

use Anteris\Autotask\API\Currencies\CurrencyCollection;
use Anteris\Autotask\API\Currencies\CurrencyEntity;
use Anteris\Autotask\API\Currencies\CurrencyService;
use Anteris\Autotask\API\Currencies\CurrencyQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CurrencyService.
 */
class CurrencyServiceTest extends AbstractTest
{
    /**
     * @covers CurrencyService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CurrencyService::class,
            $this->client->currencies()
        );
    }

    /**
     * @covers CurrencyService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->currencies()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CurrencyCollection::class,
            $result
        );
    }

    /**
     * @covers CurrencyCollection
     */
    public function test_collection_contains_currency_entities()
    {
        $result = $this->client->currencies()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CurrencyEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CurrencyService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CurrencyQueryBuilder::class,
            $this->client->currencies()->query()
        );
    }
}
