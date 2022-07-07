<?php

use Anteris\Autotask\API\TicketNoteWebhookFields\TicketNoteWebhookFieldCollection;
use Anteris\Autotask\API\TicketNoteWebhookFields\TicketNoteWebhookFieldEntity;
use Anteris\Autotask\API\TicketNoteWebhookFields\TicketNoteWebhookFieldService;
use Anteris\Autotask\API\TicketNoteWebhookFields\TicketNoteWebhookFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketNoteWebhookFieldService.
 */
class TicketNoteWebhookFieldServiceTest extends AbstractTest
{
    /**
     * @covers TicketNoteWebhookFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketNoteWebhookFieldService::class,
            $this->client->ticketNoteWebhookFields()
        );
    }
}
