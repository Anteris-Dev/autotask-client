<?php

use Anteris\Autotask\API\TicketNotes\TicketNoteCollection;
use Anteris\Autotask\API\TicketNotes\TicketNoteEntity;
use Anteris\Autotask\API\TicketNotes\TicketNoteService;
use Anteris\Autotask\API\TicketNotes\TicketNoteQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketNoteService.
 */
class TicketNoteServiceTest extends AbstractTest
{
    /**
     * @covers TicketNoteService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketNoteService::class,
            $this->client->ticketNotes()
        );
    }

    /**
     * @covers TicketNoteService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketNoteCollection::class,
            $result
        );
    }

    /**
     * @covers TicketNoteCollection
     */
    public function test_collection_contains_ticket_note_entities()
    {
        $result = $this->client->ticketNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketNoteEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketNoteService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketNoteQueryBuilder::class,
            $this->client->ticketNotes()->query()
        );
    }
}
