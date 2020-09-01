<?php

use Anteris\Autotask\API\Services\ServiceCollection;
use Anteris\Autotask\API\Services\ServiceEntity;
use Anteris\Autotask\API\Services\ServiceService;
use Anteris\Autotask\API\Services\ServiceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ServiceService.
 */
class ServiceServiceTest extends AbstractTest
{
    /**
     * @covers ServiceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ServiceService::class,
            $this->client->services()
        );
    }

    /**
     * @covers ServiceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->services()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ServiceCollection::class,
            $result
        );
    }

    /**
     * @covers ServiceCollection
     */
    public function test_collection_contains_service_entities()
    {
        $result = $this->client->services()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ServiceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ServiceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ServiceQueryBuilder::class,
            $this->client->services()->query()
        );
    }
}
