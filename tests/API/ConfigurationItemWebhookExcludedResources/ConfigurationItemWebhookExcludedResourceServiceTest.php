<?php

use Anteris\Autotask\API\ConfigurationItemWebhookExcludedResources\ConfigurationItemWebhookExcludedResourceCollection;
use Anteris\Autotask\API\ConfigurationItemWebhookExcludedResources\ConfigurationItemWebhookExcludedResourceEntity;
use Anteris\Autotask\API\ConfigurationItemWebhookExcludedResources\ConfigurationItemWebhookExcludedResourceService;
use Anteris\Autotask\API\ConfigurationItemWebhookExcludedResources\ConfigurationItemWebhookExcludedResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemWebhookExcludedResourceService.
 */
class ConfigurationItemWebhookExcludedResourceServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemWebhookExcludedResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemWebhookExcludedResourceService::class,
            $this->client->configurationItemWebhookExcludedResources()
        );
    }
}
