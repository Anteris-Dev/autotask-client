<?php

use Anteris\Autotask\API\CompanyWebhooks\CompanyWebhookCollection;
use Anteris\Autotask\API\CompanyWebhooks\CompanyWebhookEntity;
use Anteris\Autotask\API\CompanyWebhooks\CompanyWebhookService;
use Anteris\Autotask\API\CompanyWebhooks\CompanyWebhookQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyWebhookService.
 */
class CompanyWebhookServiceTest extends AbstractTest
{
    /**
     * @covers CompanyWebhookService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyWebhookService::class,
            $this->client->companyWebhooks()
        );
    }
}
