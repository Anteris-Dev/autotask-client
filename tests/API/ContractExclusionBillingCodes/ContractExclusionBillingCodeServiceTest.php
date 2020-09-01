<?php

use Anteris\Autotask\API\ContractExclusionBillingCodes\ContractExclusionBillingCodeCollection;
use Anteris\Autotask\API\ContractExclusionBillingCodes\ContractExclusionBillingCodeEntity;
use Anteris\Autotask\API\ContractExclusionBillingCodes\ContractExclusionBillingCodeService;
use Anteris\Autotask\API\ContractExclusionBillingCodes\ContractExclusionBillingCodeQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractExclusionBillingCodeService.
 */
class ContractExclusionBillingCodeServiceTest extends AbstractTest
{
    /**
     * @covers ContractExclusionBillingCodeService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractExclusionBillingCodeService::class,
            $this->client->contractExclusionBillingCodes()
        );
    }

    /**
     * @covers ContractExclusionBillingCodeService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractExclusionBillingCodes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractExclusionBillingCodeCollection::class,
            $result
        );
    }

    /**
     * @covers ContractExclusionBillingCodeCollection
     */
    public function test_collection_contains_contract_exclusion_billing_code_entities()
    {
        $result = $this->client->contractExclusionBillingCodes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractExclusionBillingCodeEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractExclusionBillingCodeService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractExclusionBillingCodeQueryBuilder::class,
            $this->client->contractExclusionBillingCodes()->query()
        );
    }
}
