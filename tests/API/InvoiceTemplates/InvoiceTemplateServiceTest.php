<?php

use Anteris\Autotask\API\InvoiceTemplates\InvoiceTemplateCollection;
use Anteris\Autotask\API\InvoiceTemplates\InvoiceTemplateEntity;
use Anteris\Autotask\API\InvoiceTemplates\InvoiceTemplateService;
use Anteris\Autotask\API\InvoiceTemplates\InvoiceTemplateQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for InvoiceTemplateService.
 */
class InvoiceTemplateServiceTest extends AbstractTest
{
    /**
     * @covers InvoiceTemplateService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InvoiceTemplateService::class,
            $this->client->invoiceTemplates()
        );
    }

    /**
     * @covers InvoiceTemplateService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->invoiceTemplates()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            InvoiceTemplateCollection::class,
            $result
        );
    }

    /**
     * @covers InvoiceTemplateCollection
     */
    public function test_collection_contains_invoice_template_entities()
    {
        $result = $this->client->invoiceTemplates()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                InvoiceTemplateEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers InvoiceTemplateService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            InvoiceTemplateQueryBuilder::class,
            $this->client->invoiceTemplates()->query()
        );
    }
}
