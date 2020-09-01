<?php

use Anteris\Autotask\API\ServiceCallTaskResources\ServiceCallTaskResourceCollection;
use Anteris\Autotask\API\ServiceCallTaskResources\ServiceCallTaskResourceEntity;
use Anteris\Autotask\API\ServiceCallTaskResources\ServiceCallTaskResourceService;
use Anteris\Autotask\API\ServiceCallTaskResources\ServiceCallTaskResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ServiceCallTaskResourceService.
 */
class ServiceCallTaskResourceServiceTest extends AbstractTest
{
    /**
     * @covers ServiceCallTaskResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ServiceCallTaskResourceService::class,
            $this->client->serviceCallTaskResources()
        );
    }

    /**
     * @covers ServiceCallTaskResourceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->serviceCallTaskResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ServiceCallTaskResourceCollection::class,
            $result
        );
    }

    /**
     * @covers ServiceCallTaskResourceCollection
     */
    public function test_collection_contains_service_call_task_resource_entities()
    {
        $result = $this->client->serviceCallTaskResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ServiceCallTaskResourceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ServiceCallTaskResourceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ServiceCallTaskResourceQueryBuilder::class,
            $this->client->serviceCallTaskResources()->query()
        );
    }
}
