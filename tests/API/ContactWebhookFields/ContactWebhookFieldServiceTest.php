<?php

use Anteris\Autotask\API\ContactWebhookFields\ContactWebhookFieldCollection;
use Anteris\Autotask\API\ContactWebhookFields\ContactWebhookFieldEntity;
use Anteris\Autotask\API\ContactWebhookFields\ContactWebhookFieldService;
use Anteris\Autotask\API\ContactWebhookFields\ContactWebhookFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContactWebhookFieldService.
 */
class ContactWebhookFieldServiceTest extends AbstractTest
{
    /**
     * @covers ContactWebhookFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContactWebhookFieldService::class,
            $this->client->contactWebhookFields()
        );
    }
}
