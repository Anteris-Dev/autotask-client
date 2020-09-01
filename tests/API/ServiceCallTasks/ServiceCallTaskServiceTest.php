<?php

use Anteris\Autotask\API\ServiceCallTasks\ServiceCallTaskCollection;
use Anteris\Autotask\API\ServiceCallTasks\ServiceCallTaskEntity;
use Anteris\Autotask\API\ServiceCallTasks\ServiceCallTaskService;
use Anteris\Autotask\API\ServiceCallTasks\ServiceCallTaskQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ServiceCallTaskService.
 */
class ServiceCallTaskServiceTest extends AbstractTest
{
    /**
     * @covers ServiceCallTaskService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ServiceCallTaskService::class,
            $this->client->serviceCallTasks()
        );
    }

    /**
     * @covers ServiceCallTaskService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->serviceCallTasks()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ServiceCallTaskCollection::class,
            $result
        );
    }

    /**
     * @covers ServiceCallTaskCollection
     */
    public function test_collection_contains_service_call_task_entities()
    {
        $result = $this->client->serviceCallTasks()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ServiceCallTaskEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ServiceCallTaskService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ServiceCallTaskQueryBuilder::class,
            $this->client->serviceCallTasks()->query()
        );
    }
}
