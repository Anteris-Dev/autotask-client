<?php

use Anteris\Autotask\API\ConfigurationItemWebhooks\ConfigurationItemWebhookCollection;
use Anteris\Autotask\API\ConfigurationItemWebhooks\ConfigurationItemWebhookEntity;
use Anteris\Autotask\API\ConfigurationItemWebhooks\ConfigurationItemWebhookService;
use Anteris\Autotask\API\ConfigurationItemWebhooks\ConfigurationItemWebhookQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemWebhookService.
 */
class ConfigurationItemWebhookServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemWebhookService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemWebhookService::class,
            $this->client->configurationItemWebhooks()
        );
    }
}
