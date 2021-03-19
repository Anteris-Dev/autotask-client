<?php

use Anteris\Autotask\API\DocumentNotes\DocumentNoteCollection;
use Anteris\Autotask\API\DocumentNotes\DocumentNoteEntity;
use Anteris\Autotask\API\DocumentNotes\DocumentNoteService;
use Anteris\Autotask\API\DocumentNotes\DocumentNoteQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DocumentNoteService.
 */
class DocumentNoteServiceTest extends AbstractTest
{
    /**
     * @covers DocumentNoteService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DocumentNoteService::class,
            $this->client->documentNotes()
        );
    }

    /**
     * @covers DocumentNoteService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->documentNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DocumentNoteCollection::class,
            $result
        );
    }

    /**
     * @covers DocumentNoteCollection
     */
    public function test_collection_contains_document_note_entities()
    {
        $result = $this->client->documentNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DocumentNoteEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DocumentNoteService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DocumentNoteQueryBuilder::class,
            $this->client->documentNotes()->query()
        );
    }
}
