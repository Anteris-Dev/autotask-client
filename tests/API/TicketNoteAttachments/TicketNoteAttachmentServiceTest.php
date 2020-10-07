<?php

use Anteris\Autotask\API\TicketNoteAttachments\TicketNoteAttachmentCollection;
use Anteris\Autotask\API\TicketNoteAttachments\TicketNoteAttachmentEntity;
use Anteris\Autotask\API\TicketNoteAttachments\TicketNoteAttachmentService;
use Anteris\Autotask\API\TicketNoteAttachments\TicketNoteAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketNoteAttachmentService.
 */
class TicketNoteAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers TicketNoteAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketNoteAttachmentService::class,
            $this->client->ticketNoteAttachments()
        );
    }

    /**
     * @covers TicketNoteAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketNoteAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketNoteAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers TicketNoteAttachmentCollection
     */
    public function test_collection_contains_ticket_note_attachment_entities()
    {
        $result = $this->client->ticketNoteAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketNoteAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketNoteAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketNoteAttachmentQueryBuilder::class,
            $this->client->ticketNoteAttachments()->query()
        );
    }
}
