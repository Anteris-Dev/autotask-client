<?php

use Anteris\Autotask\API\ContractExclusionSets\ContractExclusionSetCollection;
use Anteris\Autotask\API\ContractExclusionSets\ContractExclusionSetEntity;
use Anteris\Autotask\API\ContractExclusionSets\ContractExclusionSetService;
use Anteris\Autotask\API\ContractExclusionSets\ContractExclusionSetQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractExclusionSetService.
 */
class ContractExclusionSetServiceTest extends AbstractTest
{
    /**
     * @covers ContractExclusionSetService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractExclusionSetService::class,
            $this->client->contractExclusionSets()
        );
    }

    /**
     * @covers ContractExclusionSetService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractExclusionSets()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractExclusionSetCollection::class,
            $result
        );
    }

    /**
     * @covers ContractExclusionSetCollection
     */
    public function test_collection_contains_contract_exclusion_set_entities()
    {
        $result = $this->client->contractExclusionSets()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractExclusionSetEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractExclusionSetService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractExclusionSetQueryBuilder::class,
            $this->client->contractExclusionSets()->query()
        );
    }
}
