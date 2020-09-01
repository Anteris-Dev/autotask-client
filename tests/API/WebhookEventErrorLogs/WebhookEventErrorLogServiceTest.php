<?php

use Anteris\Autotask\API\WebhookEventErrorLogs\WebhookEventErrorLogCollection;
use Anteris\Autotask\API\WebhookEventErrorLogs\WebhookEventErrorLogEntity;
use Anteris\Autotask\API\WebhookEventErrorLogs\WebhookEventErrorLogService;
use Anteris\Autotask\API\WebhookEventErrorLogs\WebhookEventErrorLogQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for WebhookEventErrorLogService.
 */
class WebhookEventErrorLogServiceTest extends AbstractTest
{
    /**
     * @covers WebhookEventErrorLogService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            WebhookEventErrorLogService::class,
            $this->client->webhookEventErrorLogs()
        );
    }
}
