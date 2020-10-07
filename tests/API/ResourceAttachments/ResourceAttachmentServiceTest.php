<?php

use Anteris\Autotask\API\ResourceAttachments\ResourceAttachmentCollection;
use Anteris\Autotask\API\ResourceAttachments\ResourceAttachmentEntity;
use Anteris\Autotask\API\ResourceAttachments\ResourceAttachmentService;
use Anteris\Autotask\API\ResourceAttachments\ResourceAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ResourceAttachmentService.
 */
class ResourceAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers ResourceAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ResourceAttachmentService::class,
            $this->client->resourceAttachments()
        );
    }

    /**
     * @covers ResourceAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->resourceAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ResourceAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers ResourceAttachmentCollection
     */
    public function test_collection_contains_resource_attachment_entities()
    {
        $result = $this->client->resourceAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ResourceAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ResourceAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ResourceAttachmentQueryBuilder::class,
            $this->client->resourceAttachments()->query()
        );
    }
}
