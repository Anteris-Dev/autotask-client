<?php

use Anteris\Autotask\API\ContractMilestones\ContractMilestoneCollection;
use Anteris\Autotask\API\ContractMilestones\ContractMilestoneEntity;
use Anteris\Autotask\API\ContractMilestones\ContractMilestoneService;
use Anteris\Autotask\API\ContractMilestones\ContractMilestoneQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractMilestoneService.
 */
class ContractMilestoneServiceTest extends AbstractTest
{
    /**
     * @covers ContractMilestoneService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractMilestoneService::class,
            $this->client->contractMilestones()
        );
    }

    /**
     * @covers ContractMilestoneService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractMilestones()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractMilestoneCollection::class,
            $result
        );
    }

    /**
     * @covers ContractMilestoneCollection
     */
    public function test_collection_contains_contract_milestone_entities()
    {
        $result = $this->client->contractMilestones()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractMilestoneEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractMilestoneService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractMilestoneQueryBuilder::class,
            $this->client->contractMilestones()->query()
        );
    }
}
