<?php

use Anteris\Autotask\API\ResourceRoleQueues\ResourceRoleQueueCollection;
use Anteris\Autotask\API\ResourceRoleQueues\ResourceRoleQueueEntity;
use Anteris\Autotask\API\ResourceRoleQueues\ResourceRoleQueueService;
use Anteris\Autotask\API\ResourceRoleQueues\ResourceRoleQueueQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ResourceRoleQueueService.
 */
class ResourceRoleQueueServiceTest extends AbstractTest
{
    /**
     * @covers ResourceRoleQueueService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ResourceRoleQueueService::class,
            $this->client->resourceRoleQueues()
        );
    }

    /**
     * @covers ResourceRoleQueueService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->resourceRoleQueues()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ResourceRoleQueueCollection::class,
            $result
        );
    }

    /**
     * @covers ResourceRoleQueueCollection
     */
    public function test_collection_contains_resource_role_queue_entities()
    {
        $result = $this->client->resourceRoleQueues()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ResourceRoleQueueEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ResourceRoleQueueService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ResourceRoleQueueQueryBuilder::class,
            $this->client->resourceRoleQueues()->query()
        );
    }
}
