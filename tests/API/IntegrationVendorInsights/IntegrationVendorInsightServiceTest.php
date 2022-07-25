<?php

use Anteris\Autotask\API\IntegrationVendorInsights\IntegrationVendorInsightCollection;
use Anteris\Autotask\API\IntegrationVendorInsights\IntegrationVendorInsightEntity;
use Anteris\Autotask\API\IntegrationVendorInsights\IntegrationVendorInsightService;
use Anteris\Autotask\API\IntegrationVendorInsights\IntegrationVendorInsightQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for IntegrationVendorInsightService.
 */
class IntegrationVendorInsightServiceTest extends AbstractTest
{
    /**
     * @covers IntegrationVendorInsightService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            IntegrationVendorInsightService::class,
            $this->client->integrationVendorInsights()
        );
    }

    /**
     * @covers IntegrationVendorInsightService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->integrationVendorInsights()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            IntegrationVendorInsightCollection::class,
            $result
        );
    }

    /**
     * @covers IntegrationVendorInsightCollection
     */
    public function test_collection_contains_integration_vendor_insight_entities()
    {
        $result = $this->client->integrationVendorInsights()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                IntegrationVendorInsightEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers IntegrationVendorInsightService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            IntegrationVendorInsightQueryBuilder::class,
            $this->client->integrationVendorInsights()->query()
        );
    }
}
