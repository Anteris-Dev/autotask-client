<?php

use Anteris\Autotask\API\ConfigurationItemWebhookFields\ConfigurationItemWebhookFieldCollection;
use Anteris\Autotask\API\ConfigurationItemWebhookFields\ConfigurationItemWebhookFieldEntity;
use Anteris\Autotask\API\ConfigurationItemWebhookFields\ConfigurationItemWebhookFieldService;
use Anteris\Autotask\API\ConfigurationItemWebhookFields\ConfigurationItemWebhookFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemWebhookFieldService.
 */
class ConfigurationItemWebhookFieldServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemWebhookFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemWebhookFieldService::class,
            $this->client->configurationItemWebhookFields()
        );
    }
}
