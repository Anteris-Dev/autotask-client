<?php

use Anteris\Autotask\API\ResourceDailyAvailabilities\ResourceDailyAvailabilityCollection;
use Anteris\Autotask\API\ResourceDailyAvailabilities\ResourceDailyAvailabilityEntity;
use Anteris\Autotask\API\ResourceDailyAvailabilities\ResourceDailyAvailabilityService;
use Anteris\Autotask\API\ResourceDailyAvailabilities\ResourceDailyAvailabilityQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ResourceDailyAvailabilityService.
 */
class ResourceDailyAvailabilityServiceTest extends AbstractTest
{
    /**
     * @covers ResourceDailyAvailabilityService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ResourceDailyAvailabilityService::class,
            $this->client->resourceDailyAvailabilities()
        );
    }

    /**
     * @covers ResourceDailyAvailabilityService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->resourceDailyAvailabilities()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ResourceDailyAvailabilityCollection::class,
            $result
        );
    }

    /**
     * @covers ResourceDailyAvailabilityCollection
     */
    public function test_collection_contains_resource_daily_availability_entities()
    {
        $result = $this->client->resourceDailyAvailabilities()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ResourceDailyAvailabilityEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ResourceDailyAvailabilityService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ResourceDailyAvailabilityQueryBuilder::class,
            $this->client->resourceDailyAvailabilities()->query()
        );
    }
}
