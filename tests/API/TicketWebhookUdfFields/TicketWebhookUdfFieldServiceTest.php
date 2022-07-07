<?php

use Anteris\Autotask\API\TicketWebhookUdfFields\TicketWebhookUdfFieldCollection;
use Anteris\Autotask\API\TicketWebhookUdfFields\TicketWebhookUdfFieldEntity;
use Anteris\Autotask\API\TicketWebhookUdfFields\TicketWebhookUdfFieldService;
use Anteris\Autotask\API\TicketWebhookUdfFields\TicketWebhookUdfFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketWebhookUdfFieldService.
 */
class TicketWebhookUdfFieldServiceTest extends AbstractTest
{
    /**
     * @covers TicketWebhookUdfFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketWebhookUdfFieldService::class,
            $this->client->ticketWebhookUdfFields()
        );
    }
}
