<?php

use Anteris\Autotask\API\ContactWebhookExcludedResources\ContactWebhookExcludedResourceCollection;
use Anteris\Autotask\API\ContactWebhookExcludedResources\ContactWebhookExcludedResourceEntity;
use Anteris\Autotask\API\ContactWebhookExcludedResources\ContactWebhookExcludedResourceService;
use Anteris\Autotask\API\ContactWebhookExcludedResources\ContactWebhookExcludedResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContactWebhookExcludedResourceService.
 */
class ContactWebhookExcludedResourceServiceTest extends AbstractTest
{
    /**
     * @covers ContactWebhookExcludedResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContactWebhookExcludedResourceService::class,
            $this->client->contactWebhookExcludedResources()
        );
    }
}
