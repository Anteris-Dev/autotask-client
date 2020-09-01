<?php

use Anteris\Autotask\API\Departments\DepartmentCollection;
use Anteris\Autotask\API\Departments\DepartmentEntity;
use Anteris\Autotask\API\Departments\DepartmentService;
use Anteris\Autotask\API\Departments\DepartmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DepartmentService.
 */
class DepartmentServiceTest extends AbstractTest
{
    /**
     * @covers DepartmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DepartmentService::class,
            $this->client->departments()
        );
    }

    /**
     * @covers DepartmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->departments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DepartmentCollection::class,
            $result
        );
    }

    /**
     * @covers DepartmentCollection
     */
    public function test_collection_contains_department_entities()
    {
        $result = $this->client->departments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DepartmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DepartmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DepartmentQueryBuilder::class,
            $this->client->departments()->query()
        );
    }
}
