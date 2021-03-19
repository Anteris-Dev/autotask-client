<?php

use Anteris\Autotask\API\IntegrationVendorWidgets\IntegrationVendorWidgetCollection;
use Anteris\Autotask\API\IntegrationVendorWidgets\IntegrationVendorWidgetEntity;
use Anteris\Autotask\API\IntegrationVendorWidgets\IntegrationVendorWidgetService;
use Anteris\Autotask\API\IntegrationVendorWidgets\IntegrationVendorWidgetQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for IntegrationVendorWidgetService.
 */
class IntegrationVendorWidgetServiceTest extends AbstractTest
{
    /**
     * @covers IntegrationVendorWidgetService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            IntegrationVendorWidgetService::class,
            $this->client->integrationVendorWidgets()
        );
    }

    /**
     * @covers IntegrationVendorWidgetService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->integrationVendorWidgets()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            IntegrationVendorWidgetCollection::class,
            $result
        );
    }

    /**
     * @covers IntegrationVendorWidgetCollection
     */
    public function test_collection_contains_integration_vendor_widget_entities()
    {
        $result = $this->client->integrationVendorWidgets()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                IntegrationVendorWidgetEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers IntegrationVendorWidgetService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            IntegrationVendorWidgetQueryBuilder::class,
            $this->client->integrationVendorWidgets()->query()
        );
    }
}
