<?php

use Anteris\Autotask\API\BillingCodes\BillingCodeCollection;
use Anteris\Autotask\API\BillingCodes\BillingCodeEntity;
use Anteris\Autotask\API\BillingCodes\BillingCodeService;
use Anteris\Autotask\API\BillingCodes\BillingCodeQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for BillingCodeService.
 */
class BillingCodeServiceTest extends AbstractTest
{
    /**
     * @covers BillingCodeService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            BillingCodeService::class,
            $this->client->billingCodes()
        );
    }

    /**
     * @covers BillingCodeService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->billingCodes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            BillingCodeCollection::class,
            $result
        );
    }

    /**
     * @covers BillingCodeCollection
     */
    public function test_collection_contains_billing_code_entities()
    {
        $result = $this->client->billingCodes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                BillingCodeEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers BillingCodeService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            BillingCodeQueryBuilder::class,
            $this->client->billingCodes()->query()
        );
    }
}
