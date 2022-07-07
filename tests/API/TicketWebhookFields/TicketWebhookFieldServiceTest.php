<?php

use Anteris\Autotask\API\TicketWebhookFields\TicketWebhookFieldCollection;
use Anteris\Autotask\API\TicketWebhookFields\TicketWebhookFieldEntity;
use Anteris\Autotask\API\TicketWebhookFields\TicketWebhookFieldService;
use Anteris\Autotask\API\TicketWebhookFields\TicketWebhookFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketWebhookFieldService.
 */
class TicketWebhookFieldServiceTest extends AbstractTest
{
    /**
     * @covers TicketWebhookFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketWebhookFieldService::class,
            $this->client->ticketWebhookFields()
        );
    }
}
