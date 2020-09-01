<?php

use Anteris\Autotask\API\AdditionalInvoiceFieldValues\AdditionalInvoiceFieldValueCollection;
use Anteris\Autotask\API\AdditionalInvoiceFieldValues\AdditionalInvoiceFieldValueEntity;
use Anteris\Autotask\API\AdditionalInvoiceFieldValues\AdditionalInvoiceFieldValueService;
use Anteris\Autotask\API\AdditionalInvoiceFieldValues\AdditionalInvoiceFieldValueQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for AdditionalInvoiceFieldValueService.
 */
class AdditionalInvoiceFieldValueServiceTest extends AbstractTest
{
    /**
     * @covers AdditionalInvoiceFieldValueService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            AdditionalInvoiceFieldValueService::class,
            $this->client->additionalInvoiceFieldValues()
        );
    }

    /**
     * @covers AdditionalInvoiceFieldValueService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->additionalInvoiceFieldValues()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            AdditionalInvoiceFieldValueCollection::class,
            $result
        );
    }

    /**
     * @covers AdditionalInvoiceFieldValueCollection
     */
    public function test_collection_contains_additional_invoice_field_value_entities()
    {
        $result = $this->client->additionalInvoiceFieldValues()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                AdditionalInvoiceFieldValueEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers AdditionalInvoiceFieldValueService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            AdditionalInvoiceFieldValueQueryBuilder::class,
            $this->client->additionalInvoiceFieldValues()->query()
        );
    }
}
