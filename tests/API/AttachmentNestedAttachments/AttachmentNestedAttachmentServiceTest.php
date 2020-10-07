<?php

use Anteris\Autotask\API\AttachmentNestedAttachments\AttachmentNestedAttachmentCollection;
use Anteris\Autotask\API\AttachmentNestedAttachments\AttachmentNestedAttachmentEntity;
use Anteris\Autotask\API\AttachmentNestedAttachments\AttachmentNestedAttachmentService;
use Anteris\Autotask\API\AttachmentNestedAttachments\AttachmentNestedAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for AttachmentNestedAttachmentService.
 */
class AttachmentNestedAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers AttachmentNestedAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            AttachmentNestedAttachmentService::class,
            $this->client->attachmentNestedAttachments()
        );
    }

    /**
     * @covers AttachmentNestedAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->attachmentNestedAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            AttachmentNestedAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers AttachmentNestedAttachmentCollection
     */
    public function test_collection_contains_attachment_nested_attachment_entities()
    {
        $result = $this->client->attachmentNestedAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                AttachmentNestedAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers AttachmentNestedAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            AttachmentNestedAttachmentQueryBuilder::class,
            $this->client->attachmentNestedAttachments()->query()
        );
    }
}
