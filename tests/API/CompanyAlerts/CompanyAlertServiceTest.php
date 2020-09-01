<?php

use Anteris\Autotask\API\CompanyAlerts\CompanyAlertCollection;
use Anteris\Autotask\API\CompanyAlerts\CompanyAlertEntity;
use Anteris\Autotask\API\CompanyAlerts\CompanyAlertService;
use Anteris\Autotask\API\CompanyAlerts\CompanyAlertQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyAlertService.
 */
class CompanyAlertServiceTest extends AbstractTest
{
    /**
     * @covers CompanyAlertService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyAlertService::class,
            $this->client->companyAlerts()
        );
    }

    /**
     * @covers CompanyAlertService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->companyAlerts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CompanyAlertCollection::class,
            $result
        );
    }

    /**
     * @covers CompanyAlertCollection
     */
    public function test_collection_contains_company_alert_entities()
    {
        $result = $this->client->companyAlerts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CompanyAlertEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CompanyAlertService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CompanyAlertQueryBuilder::class,
            $this->client->companyAlerts()->query()
        );
    }
}
