<?php

use Anteris\Autotask\API\Resources\ResourceCollection;
use Anteris\Autotask\API\Resources\ResourceEntity;
use Anteris\Autotask\API\Resources\ResourceService;
use Anteris\Autotask\API\Resources\ResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ResourceService.
 */
class ResourceServiceTest extends AbstractTest
{
    /**
     * @covers ResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ResourceService::class,
            $this->client->resources()
        );
    }

    /**
     * @covers ResourceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->resources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ResourceCollection::class,
            $result
        );
    }

    /**
     * @covers ResourceCollection
     */
    public function test_collection_contains_resource_entities()
    {
        $result = $this->client->resources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ResourceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ResourceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ResourceQueryBuilder::class,
            $this->client->resources()->query()
        );
    }
}
