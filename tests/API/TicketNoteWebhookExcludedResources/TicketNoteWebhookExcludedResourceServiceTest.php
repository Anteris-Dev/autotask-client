<?php

use Anteris\Autotask\API\TicketNoteWebhookExcludedResources\TicketNoteWebhookExcludedResourceCollection;
use Anteris\Autotask\API\TicketNoteWebhookExcludedResources\TicketNoteWebhookExcludedResourceEntity;
use Anteris\Autotask\API\TicketNoteWebhookExcludedResources\TicketNoteWebhookExcludedResourceService;
use Anteris\Autotask\API\TicketNoteWebhookExcludedResources\TicketNoteWebhookExcludedResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketNoteWebhookExcludedResourceService.
 */
class TicketNoteWebhookExcludedResourceServiceTest extends AbstractTest
{
    /**
     * @covers TicketNoteWebhookExcludedResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketNoteWebhookExcludedResourceService::class,
            $this->client->ticketNoteWebhookExcludedResources()
        );
    }
}
