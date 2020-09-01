<?php

use Anteris\Autotask\API\CompanyLocations\CompanyLocationCollection;
use Anteris\Autotask\API\CompanyLocations\CompanyLocationEntity;
use Anteris\Autotask\API\CompanyLocations\CompanyLocationService;
use Anteris\Autotask\API\CompanyLocations\CompanyLocationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyLocationService.
 */
class CompanyLocationServiceTest extends AbstractTest
{
    /**
     * @covers CompanyLocationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyLocationService::class,
            $this->client->companyLocations()
        );
    }

    /**
     * @covers CompanyLocationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->companyLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CompanyLocationCollection::class,
            $result
        );
    }

    /**
     * @covers CompanyLocationCollection
     */
    public function test_collection_contains_company_location_entities()
    {
        $result = $this->client->companyLocations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CompanyLocationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CompanyLocationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CompanyLocationQueryBuilder::class,
            $this->client->companyLocations()->query()
        );
    }
}
