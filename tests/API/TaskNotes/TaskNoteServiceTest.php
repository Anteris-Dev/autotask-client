<?php

use Anteris\Autotask\API\TaskNotes\TaskNoteCollection;
use Anteris\Autotask\API\TaskNotes\TaskNoteEntity;
use Anteris\Autotask\API\TaskNotes\TaskNoteService;
use Anteris\Autotask\API\TaskNotes\TaskNoteQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TaskNoteService.
 */
class TaskNoteServiceTest extends AbstractTest
{
    /**
     * @covers TaskNoteService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TaskNoteService::class,
            $this->client->taskNotes()
        );
    }

    /**
     * @covers TaskNoteService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->taskNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TaskNoteCollection::class,
            $result
        );
    }

    /**
     * @covers TaskNoteCollection
     */
    public function test_collection_contains_task_note_entities()
    {
        $result = $this->client->taskNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TaskNoteEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TaskNoteService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TaskNoteQueryBuilder::class,
            $this->client->taskNotes()->query()
        );
    }
}
