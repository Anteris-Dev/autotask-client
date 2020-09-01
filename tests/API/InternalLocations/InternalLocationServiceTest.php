<?php

use Anteris\Autotask\API\InternalLocations\InternalLocationCollection;
use Anteris\Autotask\API\InternalLocations\InternalLocationEntity;
use Anteris\Autotask\API\InternalLocations\InternalLocationService;
use Anteris\Autotask\API\InternalLocations\InternalLocationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InternalLocationService.
 */
class InternalLocationServiceTest extends AbstractTest
{
    /**
     * @covers InternalLocationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InternalLocationService::class,
            $this->client->internalLocations()
        );
    }

    /**
     * @covers InternalLocationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->internalLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InternalLocationCollection::class,
            $result
        );
    }

    /**
     * @covers InternalLocationCollection
     */
    public function test_collection_contains_internal_location_entities()
    {
        $result = $this->client->internalLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InternalLocationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InternalLocationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InternalLocationQueryBuilder::class,
            $this->client->internalLocations()->query()
        );
    }
}
