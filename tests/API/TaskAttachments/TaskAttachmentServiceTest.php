<?php

use Anteris\Autotask\API\TaskAttachments\TaskAttachmentCollection;
use Anteris\Autotask\API\TaskAttachments\TaskAttachmentEntity;
use Anteris\Autotask\API\TaskAttachments\TaskAttachmentService;
use Anteris\Autotask\API\TaskAttachments\TaskAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaskAttachmentService.
 */
class TaskAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers TaskAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaskAttachmentService::class,
            $this->client->taskAttachments()
        );
    }

    /**
     * @covers TaskAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->taskAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaskAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers TaskAttachmentCollection
     */
    public function test_collection_contains_task_attachment_entities()
    {
        $result = $this->client->taskAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaskAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaskAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaskAttachmentQueryBuilder::class,
            $this->client->taskAttachments()->query()
        );
    }
}
