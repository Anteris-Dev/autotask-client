<?php

use Anteris\Autotask\API\SalesOrderAttachments\SalesOrderAttachmentCollection;
use Anteris\Autotask\API\SalesOrderAttachments\SalesOrderAttachmentEntity;
use Anteris\Autotask\API\SalesOrderAttachments\SalesOrderAttachmentService;
use Anteris\Autotask\API\SalesOrderAttachments\SalesOrderAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for SalesOrderAttachmentService.
 */
class SalesOrderAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers SalesOrderAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            SalesOrderAttachmentService::class,
            $this->client->salesOrderAttachments()
        );
    }

    /**
     * @covers SalesOrderAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->salesOrderAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            SalesOrderAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers SalesOrderAttachmentCollection
     */
    public function test_collection_contains_sales_order_attachment_entities()
    {
        $result = $this->client->salesOrderAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                SalesOrderAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers SalesOrderAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            SalesOrderAttachmentQueryBuilder::class,
            $this->client->salesOrderAttachments()->query()
        );
    }
}
