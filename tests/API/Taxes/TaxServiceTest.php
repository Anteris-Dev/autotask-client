<?php

use Anteris\Autotask\API\Taxes\TaxCollection;
use Anteris\Autotask\API\Taxes\TaxEntity;
use Anteris\Autotask\API\Taxes\TaxService;
use Anteris\Autotask\API\Taxes\TaxQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaxService.
 */
class TaxServiceTest extends AbstractTest
{
    /**
     * @covers TaxService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaxService::class,
            $this->client->taxes()
        );
    }

    /**
     * @covers TaxService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->taxes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaxCollection::class,
            $result
        );
    }

    /**
     * @covers TaxCollection
     */
    public function test_collection_contains_tax_entities()
    {
        $result = $this->client->taxes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaxEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaxService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaxQueryBuilder::class,
            $this->client->taxes()->query()
        );
    }
}
