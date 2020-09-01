<?php

use Anteris\Autotask\API\ContractRoleCosts\ContractRoleCostCollection;
use Anteris\Autotask\API\ContractRoleCosts\ContractRoleCostEntity;
use Anteris\Autotask\API\ContractRoleCosts\ContractRoleCostService;
use Anteris\Autotask\API\ContractRoleCosts\ContractRoleCostQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractRoleCostService.
 */
class ContractRoleCostServiceTest extends AbstractTest
{
    /**
     * @covers ContractRoleCostService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractRoleCostService::class,
            $this->client->contractRoleCosts()
        );
    }

    /**
     * @covers ContractRoleCostService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractRoleCosts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractRoleCostCollection::class,
            $result
        );
    }

    /**
     * @covers ContractRoleCostCollection
     */
    public function test_collection_contains_contract_role_cost_entities()
    {
        $result = $this->client->contractRoleCosts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractRoleCostEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractRoleCostService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractRoleCostQueryBuilder::class,
            $this->client->contractRoleCosts()->query()
        );
    }
}
