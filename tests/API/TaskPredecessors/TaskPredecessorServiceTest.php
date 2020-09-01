<?php

use Anteris\Autotask\API\TaskPredecessors\TaskPredecessorCollection;
use Anteris\Autotask\API\TaskPredecessors\TaskPredecessorEntity;
use Anteris\Autotask\API\TaskPredecessors\TaskPredecessorService;
use Anteris\Autotask\API\TaskPredecessors\TaskPredecessorQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaskPredecessorService.
 */
class TaskPredecessorServiceTest extends AbstractTest
{
    /**
     * @covers TaskPredecessorService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaskPredecessorService::class,
            $this->client->taskPredecessors()
        );
    }

    /**
     * @covers TaskPredecessorService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->taskPredecessors()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaskPredecessorCollection::class,
            $result
        );
    }

    /**
     * @covers TaskPredecessorCollection
     */
    public function test_collection_contains_task_predecessor_entities()
    {
        $result = $this->client->taskPredecessors()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaskPredecessorEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaskPredecessorService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaskPredecessorQueryBuilder::class,
            $this->client->taskPredecessors()->query()
        );
    }
}
