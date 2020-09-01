<?php

use Anteris\Autotask\API\SubscriptionPeriods\SubscriptionPeriodCollection;
use Anteris\Autotask\API\SubscriptionPeriods\SubscriptionPeriodEntity;
use Anteris\Autotask\API\SubscriptionPeriods\SubscriptionPeriodService;
use Anteris\Autotask\API\SubscriptionPeriods\SubscriptionPeriodQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for SubscriptionPeriodService.
 */
class SubscriptionPeriodServiceTest extends AbstractTest
{
    /**
     * @covers SubscriptionPeriodService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            SubscriptionPeriodService::class,
            $this->client->subscriptionPeriods()
        );
    }

    /**
     * @covers SubscriptionPeriodService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->subscriptionPeriods()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            SubscriptionPeriodCollection::class,
            $result
        );
    }

    /**
     * @covers SubscriptionPeriodCollection
     */
    public function test_collection_contains_subscription_period_entities()
    {
        $result = $this->client->subscriptionPeriods()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                SubscriptionPeriodEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers SubscriptionPeriodService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            SubscriptionPeriodQueryBuilder::class,
            $this->client->subscriptionPeriods()->query()
        );
    }
}
