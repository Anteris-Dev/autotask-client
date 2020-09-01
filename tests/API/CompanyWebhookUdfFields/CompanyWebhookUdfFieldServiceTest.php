<?php

use Anteris\Autotask\API\CompanyWebhookUdfFields\CompanyWebhookUdfFieldCollection;
use Anteris\Autotask\API\CompanyWebhookUdfFields\CompanyWebhookUdfFieldEntity;
use Anteris\Autotask\API\CompanyWebhookUdfFields\CompanyWebhookUdfFieldService;
use Anteris\Autotask\API\CompanyWebhookUdfFields\CompanyWebhookUdfFieldQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyWebhookUdfFieldService.
 */
class CompanyWebhookUdfFieldServiceTest extends AbstractTest
{
    /**
     * @covers CompanyWebhookUdfFieldService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyWebhookUdfFieldService::class,
            $this->client->companyWebhookUdfFields()
        );
    }
}
