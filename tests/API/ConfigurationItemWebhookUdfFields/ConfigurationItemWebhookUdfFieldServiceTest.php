<?php

use Anteris\Autotask\API\ConfigurationItemWebhookUdfFields\ConfigurationItemWebhookUdfFieldCollection;
use Anteris\Autotask\API\ConfigurationItemWebhookUdfFields\ConfigurationItemWebhookUdfFieldEntity;
use Anteris\Autotask\API\ConfigurationItemWebhookUdfFields\ConfigurationItemWebhookUdfFieldService;
use Anteris\Autotask\API\ConfigurationItemWebhookUdfFields\ConfigurationItemWebhookUdfFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemWebhookUdfFieldService.
 */
class ConfigurationItemWebhookUdfFieldServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemWebhookUdfFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemWebhookUdfFieldService::class,
            $this->client->configurationItemWebhookUdfFields()
        );
    }
}
