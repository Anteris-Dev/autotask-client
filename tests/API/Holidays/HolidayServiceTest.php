<?php

use Anteris\Autotask\API\Holidays\HolidayCollection;
use Anteris\Autotask\API\Holidays\HolidayEntity;
use Anteris\Autotask\API\Holidays\HolidayService;
use Anteris\Autotask\API\Holidays\HolidayQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for HolidayService.
 */
class HolidayServiceTest extends AbstractTest
{
    /**
     * @covers HolidayService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            HolidayService::class,
            $this->client->holidays()
        );
    }

    /**
     * @covers HolidayService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->holidays()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            HolidayCollection::class,
            $result
        );
    }

    /**
     * @covers HolidayCollection
     */
    public function test_collection_contains_holiday_entities()
    {
        $result = $this->client->holidays()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                HolidayEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers HolidayService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            HolidayQueryBuilder::class,
            $this->client->holidays()->query()
        );
    }
}
