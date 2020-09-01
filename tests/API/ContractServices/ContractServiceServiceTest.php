<?php

use Anteris\Autotask\API\ContractServices\ContractServiceCollection;
use Anteris\Autotask\API\ContractServices\ContractServiceEntity;
use Anteris\Autotask\API\ContractServices\ContractServiceService;
use Anteris\Autotask\API\ContractServices\ContractServiceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractServiceService.
 */
class ContractServiceServiceTest extends AbstractTest
{
    /**
     * @covers ContractServiceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractServiceService::class,
            $this->client->contractServices()
        );
    }

    /**
     * @covers ContractServiceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractServices()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractServiceCollection::class,
            $result
        );
    }

    /**
     * @covers ContractServiceCollection
     */
    public function test_collection_contains_contract_service_entities()
    {
        $result = $this->client->contractServices()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractServiceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractServiceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractServiceQueryBuilder::class,
            $this->client->contractServices()->query()
        );
    }
}
