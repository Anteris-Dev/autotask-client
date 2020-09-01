<?php

use Anteris\Autotask\API\TicketAttachments\TicketAttachmentCollection;
use Anteris\Autotask\API\TicketAttachments\TicketAttachmentEntity;
use Anteris\Autotask\API\TicketAttachments\TicketAttachmentService;
use Anteris\Autotask\API\TicketAttachments\TicketAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketAttachmentService.
 */
class TicketAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers TicketAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketAttachmentService::class,
            $this->client->ticketAttachments()
        );
    }

    /**
     * @covers TicketAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers TicketAttachmentCollection
     */
    public function test_collection_contains_ticket_attachment_entities()
    {
        $result = $this->client->ticketAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketAttachmentQueryBuilder::class,
            $this->client->ticketAttachments()->query()
        );
    }
}
