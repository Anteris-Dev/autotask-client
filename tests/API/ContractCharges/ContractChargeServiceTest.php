<?php

use Anteris\Autotask\API\ContractCharges\ContractChargeCollection;
use Anteris\Autotask\API\ContractCharges\ContractChargeEntity;
use Anteris\Autotask\API\ContractCharges\ContractChargeService;
use Anteris\Autotask\API\ContractCharges\ContractChargeQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractChargeService.
 */
class ContractChargeServiceTest extends AbstractTest
{
    /**
     * @covers ContractChargeService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractChargeService::class,
            $this->client->contractCharges()
        );
    }

    /**
     * @covers ContractChargeService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractCharges()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractChargeCollection::class,
            $result
        );
    }

    /**
     * @covers ContractChargeCollection
     */
    public function test_collection_contains_contract_charge_entities()
    {
        $result = $this->client->contractCharges()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractChargeEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractChargeService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractChargeQueryBuilder::class,
            $this->client->contractCharges()->query()
        );
    }
}
