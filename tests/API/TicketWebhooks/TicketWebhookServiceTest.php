<?php

use Anteris\Autotask\API\TicketWebhooks\TicketWebhookCollection;
use Anteris\Autotask\API\TicketWebhooks\TicketWebhookEntity;
use Anteris\Autotask\API\TicketWebhooks\TicketWebhookService;
use Anteris\Autotask\API\TicketWebhooks\TicketWebhookQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketWebhookService.
 */
class TicketWebhookServiceTest extends AbstractTest
{
    /**
     * @covers TicketWebhookService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketWebhookService::class,
            $this->client->ticketWebhooks()
        );
    }
}
