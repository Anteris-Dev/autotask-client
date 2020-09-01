<?php

use Anteris\Autotask\API\ContractRates\ContractRateCollection;
use Anteris\Autotask\API\ContractRates\ContractRateEntity;
use Anteris\Autotask\API\ContractRates\ContractRateService;
use Anteris\Autotask\API\ContractRates\ContractRateQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractRateService.
 */
class ContractRateServiceTest extends AbstractTest
{
    /**
     * @covers ContractRateService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractRateService::class,
            $this->client->contractRates()
        );
    }

    /**
     * @covers ContractRateService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractRates()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractRateCollection::class,
            $result
        );
    }

    /**
     * @covers ContractRateCollection
     */
    public function test_collection_contains_contract_rate_entities()
    {
        $result = $this->client->contractRates()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractRateEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractRateService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractRateQueryBuilder::class,
            $this->client->contractRates()->query()
        );
    }
}
