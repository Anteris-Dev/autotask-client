<?php

use Anteris\Autotask\API\ContactWebhookUdfFields\ContactWebhookUdfFieldCollection;
use Anteris\Autotask\API\ContactWebhookUdfFields\ContactWebhookUdfFieldEntity;
use Anteris\Autotask\API\ContactWebhookUdfFields\ContactWebhookUdfFieldService;
use Anteris\Autotask\API\ContactWebhookUdfFields\ContactWebhookUdfFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContactWebhookUdfFieldService.
 */
class ContactWebhookUdfFieldServiceTest extends AbstractTest
{
    /**
     * @covers ContactWebhookUdfFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContactWebhookUdfFieldService::class,
            $this->client->contactWebhookUdfFields()
        );
    }
}
