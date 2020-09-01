<?php

use Anteris\Autotask\API\ContractServiceBundleUnits\ContractServiceBundleUnitCollection;
use Anteris\Autotask\API\ContractServiceBundleUnits\ContractServiceBundleUnitEntity;
use Anteris\Autotask\API\ContractServiceBundleUnits\ContractServiceBundleUnitService;
use Anteris\Autotask\API\ContractServiceBundleUnits\ContractServiceBundleUnitQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractServiceBundleUnitService.
 */
class ContractServiceBundleUnitServiceTest extends AbstractTest
{
    /**
     * @covers ContractServiceBundleUnitService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractServiceBundleUnitService::class,
            $this->client->contractServiceBundleUnits()
        );
    }

    /**
     * @covers ContractServiceBundleUnitService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractServiceBundleUnits()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractServiceBundleUnitCollection::class,
            $result
        );
    }

    /**
     * @covers ContractServiceBundleUnitCollection
     */
    public function test_collection_contains_contract_service_bundle_unit_entities()
    {
        $result = $this->client->contractServiceBundleUnits()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractServiceBundleUnitEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractServiceBundleUnitService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractServiceBundleUnitQueryBuilder::class,
            $this->client->contractServiceBundleUnits()->query()
        );
    }
}
