<?php

use Anteris\Autotask\API\CompanyToDos\CompanyToDoCollection;
use Anteris\Autotask\API\CompanyToDos\CompanyToDoEntity;
use Anteris\Autotask\API\CompanyToDos\CompanyToDoService;
use Anteris\Autotask\API\CompanyToDos\CompanyToDoQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyToDoService.
 */
class CompanyToDoServiceTest extends AbstractTest
{
    /**
     * @covers CompanyToDoService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyToDoService::class,
            $this->client->companyToDos()
        );
    }

    /**
     * @covers CompanyToDoService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->companyToDos()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CompanyToDoCollection::class,
            $result
        );
    }

    /**
     * @covers CompanyToDoCollection
     */
    public function test_collection_contains_company_to_do_entities()
    {
        $result = $this->client->companyToDos()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CompanyToDoEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CompanyToDoService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CompanyToDoQueryBuilder::class,
            $this->client->companyToDos()->query()
        );
    }
}
