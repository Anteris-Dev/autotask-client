<?php

use Anteris\Autotask\API\TicketWebhookExcludedResources\TicketWebhookExcludedResourceCollection;
use Anteris\Autotask\API\TicketWebhookExcludedResources\TicketWebhookExcludedResourceEntity;
use Anteris\Autotask\API\TicketWebhookExcludedResources\TicketWebhookExcludedResourceService;
use Anteris\Autotask\API\TicketWebhookExcludedResources\TicketWebhookExcludedResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketWebhookExcludedResourceService.
 */
class TicketWebhookExcludedResourceServiceTest extends AbstractTest
{
    /**
     * @covers TicketWebhookExcludedResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketWebhookExcludedResourceService::class,
            $this->client->ticketWebhookExcludedResources()
        );
    }
}
