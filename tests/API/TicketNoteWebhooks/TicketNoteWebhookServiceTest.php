<?php

use Anteris\Autotask\API\TicketNoteWebhooks\TicketNoteWebhookCollection;
use Anteris\Autotask\API\TicketNoteWebhooks\TicketNoteWebhookEntity;
use Anteris\Autotask\API\TicketNoteWebhooks\TicketNoteWebhookService;
use Anteris\Autotask\API\TicketNoteWebhooks\TicketNoteWebhookQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketNoteWebhookService.
 */
class TicketNoteWebhookServiceTest extends AbstractTest
{
    /**
     * @covers TicketNoteWebhookService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketNoteWebhookService::class,
            $this->client->ticketNoteWebhooks()
        );
    }
}
