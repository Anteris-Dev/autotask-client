<?php

use Anteris\Autotask\API\Tasks\TaskCollection;
use Anteris\Autotask\API\Tasks\TaskEntity;
use Anteris\Autotask\API\Tasks\TaskService;
use Anteris\Autotask\API\Tasks\TaskQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaskService.
 */
class TaskServiceTest extends AbstractTest
{
    /**
     * @covers TaskService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaskService::class,
            $this->client->tasks()
        );
    }

    /**
     * @covers TaskService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->tasks()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaskCollection::class,
            $result
        );
    }

    /**
     * @covers TaskCollection
     */
    public function test_collection_contains_task_entities()
    {
        $result = $this->client->tasks()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaskEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaskService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaskQueryBuilder::class,
            $this->client->tasks()->query()
        );
    }
}
