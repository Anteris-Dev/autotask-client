<?php

use Anteris\Autotask\API\TaxRegions\TaxRegionCollection;
use Anteris\Autotask\API\TaxRegions\TaxRegionEntity;
use Anteris\Autotask\API\TaxRegions\TaxRegionService;
use Anteris\Autotask\API\TaxRegions\TaxRegionQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaxRegionService.
 */
class TaxRegionServiceTest extends AbstractTest
{
    /**
     * @covers TaxRegionService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaxRegionService::class,
            $this->client->taxRegions()
        );
    }

    /**
     * @covers TaxRegionService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->taxRegions()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaxRegionCollection::class,
            $result
        );
    }

    /**
     * @covers TaxRegionCollection
     */
    public function test_collection_contains_tax_region_entities()
    {
        $result = $this->client->taxRegions()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaxRegionEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaxRegionService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaxRegionQueryBuilder::class,
            $this->client->taxRegions()->query()
        );
    }
}
