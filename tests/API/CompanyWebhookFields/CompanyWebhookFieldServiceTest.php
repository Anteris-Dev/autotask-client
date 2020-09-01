<?php

use Anteris\Autotask\API\CompanyWebhookFields\CompanyWebhookFieldCollection;
use Anteris\Autotask\API\CompanyWebhookFields\CompanyWebhookFieldEntity;
use Anteris\Autotask\API\CompanyWebhookFields\CompanyWebhookFieldService;
use Anteris\Autotask\API\CompanyWebhookFields\CompanyWebhookFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyWebhookFieldService.
 */
class CompanyWebhookFieldServiceTest extends AbstractTest
{
    /**
     * @covers CompanyWebhookFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyWebhookFieldService::class,
            $this->client->companyWebhookFields()
        );
    }
}
