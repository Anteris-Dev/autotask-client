<?php

use Anteris\Autotask\API\ProjectNotes\ProjectNoteCollection;
use Anteris\Autotask\API\ProjectNotes\ProjectNoteEntity;
use Anteris\Autotask\API\ProjectNotes\ProjectNoteService;
use Anteris\Autotask\API\ProjectNotes\ProjectNoteQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ProjectNoteService.
 */
class ProjectNoteServiceTest extends AbstractTest
{
    /**
     * @covers ProjectNoteService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ProjectNoteService::class,
            $this->client->projectNotes()
        );
    }

    /**
     * @covers ProjectNoteService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->projectNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ProjectNoteCollection::class,
            $result
        );
    }

    /**
     * @covers ProjectNoteCollection
     */
    public function test_collection_contains_project_note_entities()
    {
        $result = $this->client->projectNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ProjectNoteEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ProjectNoteService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ProjectNoteQueryBuilder::class,
            $this->client->projectNotes()->query()
        );
    }
}
