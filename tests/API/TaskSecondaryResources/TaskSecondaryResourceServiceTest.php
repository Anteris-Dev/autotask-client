<?php

use Anteris\Autotask\API\TaskSecondaryResources\TaskSecondaryResourceCollection;
use Anteris\Autotask\API\TaskSecondaryResources\TaskSecondaryResourceEntity;
use Anteris\Autotask\API\TaskSecondaryResources\TaskSecondaryResourceService;
use Anteris\Autotask\API\TaskSecondaryResources\TaskSecondaryResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaskSecondaryResourceService.
 */
class TaskSecondaryResourceServiceTest extends AbstractTest
{
    /**
     * @covers TaskSecondaryResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaskSecondaryResourceService::class,
            $this->client->taskSecondaryResources()
        );
    }

    /**
     * @covers TaskSecondaryResourceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->taskSecondaryResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaskSecondaryResourceCollection::class,
            $result
        );
    }

    /**
     * @covers TaskSecondaryResourceCollection
     */
    public function test_collection_contains_task_secondary_resource_entities()
    {
        $result = $this->client->taskSecondaryResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaskSecondaryResourceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaskSecondaryResourceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaskSecondaryResourceQueryBuilder::class,
            $this->client->taskSecondaryResources()->query()
        );
    }
}
