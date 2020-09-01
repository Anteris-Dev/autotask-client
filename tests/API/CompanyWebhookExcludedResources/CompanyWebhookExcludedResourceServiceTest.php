<?php

use Anteris\Autotask\API\CompanyWebhookExcludedResources\CompanyWebhookExcludedResourceCollection;
use Anteris\Autotask\API\CompanyWebhookExcludedResources\CompanyWebhookExcludedResourceEntity;
use Anteris\Autotask\API\CompanyWebhookExcludedResources\CompanyWebhookExcludedResourceService;
use Anteris\Autotask\API\CompanyWebhookExcludedResources\CompanyWebhookExcludedResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyWebhookExcludedResourceService.
 */
class CompanyWebhookExcludedResourceServiceTest extends AbstractTest
{
    /**
     * @covers CompanyWebhookExcludedResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyWebhookExcludedResourceService::class,
            $this->client->companyWebhookExcludedResources()
        );
    }
}
