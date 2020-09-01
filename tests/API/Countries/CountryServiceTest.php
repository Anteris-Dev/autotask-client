<?php

use Anteris\Autotask\API\Countries\CountryCollection;
use Anteris\Autotask\API\Countries\CountryEntity;
use Anteris\Autotask\API\Countries\CountryService;
use Anteris\Autotask\API\Countries\CountryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CountryService.
 */
class CountryServiceTest extends AbstractTest
{
    /**
     * @covers CountryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CountryService::class,
            $this->client->countries()
        );
    }

    /**
     * @covers CountryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->countries()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CountryCollection::class,
            $result
        );
    }

    /**
     * @covers CountryCollection
     */
    public function test_collection_contains_country_entities()
    {
        $result = $this->client->countries()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CountryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CountryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CountryQueryBuilder::class,
            $this->client->countries()->query()
        );
    }
}
