<?php

use Anteris\Autotask\API\ExpenseReportAttachments\ExpenseReportAttachmentCollection;
use Anteris\Autotask\API\ExpenseReportAttachments\ExpenseReportAttachmentEntity;
use Anteris\Autotask\API\ExpenseReportAttachments\ExpenseReportAttachmentService;
use Anteris\Autotask\API\ExpenseReportAttachments\ExpenseReportAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ExpenseReportAttachmentService.
 */
class ExpenseReportAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers ExpenseReportAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ExpenseReportAttachmentService::class,
            $this->client->expenseReportAttachments()
        );
    }

    /**
     * @covers ExpenseReportAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->expenseReportAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ExpenseReportAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers ExpenseReportAttachmentCollection
     */
    public function test_collection_contains_expense_report_attachment_entities()
    {
        $result = $this->client->expenseReportAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ExpenseReportAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ExpenseReportAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ExpenseReportAttachmentQueryBuilder::class,
            $this->client->expenseReportAttachments()->query()
        );
    }
}
