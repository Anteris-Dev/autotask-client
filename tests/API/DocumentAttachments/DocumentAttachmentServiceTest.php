<?php

use Anteris\Autotask\API\DocumentAttachments\DocumentAttachmentCollection;
use Anteris\Autotask\API\DocumentAttachments\DocumentAttachmentEntity;
use Anteris\Autotask\API\DocumentAttachments\DocumentAttachmentService;
use Anteris\Autotask\API\DocumentAttachments\DocumentAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DocumentAttachmentService.
 */
class DocumentAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers DocumentAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DocumentAttachmentService::class,
            $this->client->documentAttachments()
        );
    }

    /**
     * @covers DocumentAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->documentAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DocumentAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers DocumentAttachmentCollection
     */
    public function test_collection_contains_document_attachment_entities()
    {
        $result = $this->client->documentAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DocumentAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DocumentAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DocumentAttachmentQueryBuilder::class,
            $this->client->documentAttachments()->query()
        );
    }
}
