<?php

use Anteris\Autotask\API\ContractBlockHourFactors\ContractBlockHourFactorCollection;
use Anteris\Autotask\API\ContractBlockHourFactors\ContractBlockHourFactorEntity;
use Anteris\Autotask\API\ContractBlockHourFactors\ContractBlockHourFactorService;
use Anteris\Autotask\API\ContractBlockHourFactors\ContractBlockHourFactorQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractBlockHourFactorService.
 */
class ContractBlockHourFactorServiceTest extends AbstractTest
{
    /**
     * @covers ContractBlockHourFactorService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractBlockHourFactorService::class,
            $this->client->contractBlockHourFactors()
        );
    }

    /**
     * @covers ContractBlockHourFactorService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractBlockHourFactors()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractBlockHourFactorCollection::class,
            $result
        );
    }

    /**
     * @covers ContractBlockHourFactorCollection
     */
    public function test_collection_contains_contract_block_hour_factor_entities()
    {
        $result = $this->client->contractBlockHourFactors()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractBlockHourFactorEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractBlockHourFactorService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractBlockHourFactorQueryBuilder::class,
            $this->client->contractBlockHourFactors()->query()
        );
    }
}
