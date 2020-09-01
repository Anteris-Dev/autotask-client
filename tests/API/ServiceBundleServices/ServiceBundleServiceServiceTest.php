<?php

use Anteris\Autotask\API\ServiceBundleServices\ServiceBundleServiceCollection;
use Anteris\Autotask\API\ServiceBundleServices\ServiceBundleServiceEntity;
use Anteris\Autotask\API\ServiceBundleServices\ServiceBundleServiceService;
use Anteris\Autotask\API\ServiceBundleServices\ServiceBundleServiceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ServiceBundleServiceService.
 */
class ServiceBundleServiceServiceTest extends AbstractTest
{
    /**
     * @covers ServiceBundleServiceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ServiceBundleServiceService::class,
            $this->client->serviceBundleServices()
        );
    }

    /**
     * @covers ServiceBundleServiceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->serviceBundleServices()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ServiceBundleServiceCollection::class,
            $result
        );
    }

    /**
     * @covers ServiceBundleServiceCollection
     */
    public function test_collection_contains_service_bundle_service_entities()
    {
        $result = $this->client->serviceBundleServices()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ServiceBundleServiceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ServiceBundleServiceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ServiceBundleServiceQueryBuilder::class,
            $this->client->serviceBundleServices()->query()
        );
    }
}
