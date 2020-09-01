<?php

use Anteris\Autotask\API\InternalLocationWithBusinessHours\InternalLocationWithBusinessHourCollection;
use Anteris\Autotask\API\InternalLocationWithBusinessHours\InternalLocationWithBusinessHourEntity;
use Anteris\Autotask\API\InternalLocationWithBusinessHours\InternalLocationWithBusinessHourService;
use Anteris\Autotask\API\InternalLocationWithBusinessHours\InternalLocationWithBusinessHourQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InternalLocationWithBusinessHourService.
 */
class InternalLocationWithBusinessHourServiceTest extends AbstractTest
{
    /**
     * @covers InternalLocationWithBusinessHourService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InternalLocationWithBusinessHourService::class,
            $this->client->internalLocationWithBusinessHours()
        );
    }

    /**
     * @covers InternalLocationWithBusinessHourService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->internalLocationWithBusinessHours()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InternalLocationWithBusinessHourCollection::class,
            $result
        );
    }

    /**
     * @covers InternalLocationWithBusinessHourCollection
     */
    public function test_collection_contains_internal_location_with_business_hour_entities()
    {
        $result = $this->client->internalLocationWithBusinessHours()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InternalLocationWithBusinessHourEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InternalLocationWithBusinessHourService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InternalLocationWithBusinessHourQueryBuilder::class,
            $this->client->internalLocationWithBusinessHours()->query()
        );
    }
}
