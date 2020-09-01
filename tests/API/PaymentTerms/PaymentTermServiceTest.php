<?php

use Anteris\Autotask\API\PaymentTerms\PaymentTermCollection;
use Anteris\Autotask\API\PaymentTerms\PaymentTermEntity;
use Anteris\Autotask\API\PaymentTerms\PaymentTermService;
use Anteris\Autotask\API\PaymentTerms\PaymentTermQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PaymentTermService.
 */
class PaymentTermServiceTest extends AbstractTest
{
    /**
     * @covers PaymentTermService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PaymentTermService::class,
            $this->client->paymentTerms()
        );
    }

    /**
     * @covers PaymentTermService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->paymentTerms()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PaymentTermCollection::class,
            $result
        );
    }

    /**
     * @covers PaymentTermCollection
     */
    public function test_collection_contains_payment_term_entities()
    {
        $result = $this->client->paymentTerms()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PaymentTermEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PaymentTermService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PaymentTermQueryBuilder::class,
            $this->client->paymentTerms()->query()
        );
    }
}
