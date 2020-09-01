<?php

use Anteris\Autotask\API\Invoices\InvoiceCollection;
use Anteris\Autotask\API\Invoices\InvoiceEntity;
use Anteris\Autotask\API\Invoices\InvoiceService;
use Anteris\Autotask\API\Invoices\InvoiceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InvoiceService.
 */
class InvoiceServiceTest extends AbstractTest
{
    /**
     * @covers InvoiceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InvoiceService::class,
            $this->client->invoices()
        );
    }

    /**
     * @covers InvoiceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->invoices()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InvoiceCollection::class,
            $result
        );
    }

    /**
     * @covers InvoiceCollection
     */
    public function test_collection_contains_invoice_entities()
    {
        $result = $this->client->invoices()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InvoiceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InvoiceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InvoiceQueryBuilder::class,
            $this->client->invoices()->query()
        );
    }
}
