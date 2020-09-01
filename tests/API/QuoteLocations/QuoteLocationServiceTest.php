<?php

use Anteris\Autotask\API\QuoteLocations\QuoteLocationCollection;
use Anteris\Autotask\API\QuoteLocations\QuoteLocationEntity;
use Anteris\Autotask\API\QuoteLocations\QuoteLocationService;
use Anteris\Autotask\API\QuoteLocations\QuoteLocationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for QuoteLocationService.
 */
class QuoteLocationServiceTest extends AbstractTest
{
    /**
     * @covers QuoteLocationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            QuoteLocationService::class,
            $this->client->quoteLocations()
        );
    }

    /**
     * @covers QuoteLocationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->quoteLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            QuoteLocationCollection::class,
            $result
        );
    }

    /**
     * @covers QuoteLocationCollection
     */
    public function test_collection_contains_quote_location_entities()
    {
        $result = $this->client->quoteLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                QuoteLocationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers QuoteLocationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            QuoteLocationQueryBuilder::class,
            $this->client->quoteLocations()->query()
        );
    }
}
