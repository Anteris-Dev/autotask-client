<?php

use Anteris\Autotask\API\ContactWebhooks\ContactWebhookCollection;
use Anteris\Autotask\API\ContactWebhooks\ContactWebhookEntity;
use Anteris\Autotask\API\ContactWebhooks\ContactWebhookService;
use Anteris\Autotask\API\ContactWebhooks\ContactWebhookQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContactWebhookService.
 */
class ContactWebhookServiceTest extends AbstractTest
{
    /**
     * @covers ContactWebhookService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContactWebhookService::class,
            $this->client->contactWebhooks()
        );
    }
}
