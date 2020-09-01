<?php

use Anteris\Autotask\API\Subscriptions\SubscriptionCollection;
use Anteris\Autotask\API\Subscriptions\SubscriptionEntity;
use Anteris\Autotask\API\Subscriptions\SubscriptionService;
use Anteris\Autotask\API\Subscriptions\SubscriptionQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for SubscriptionService.
 */
class SubscriptionServiceTest extends AbstractTest
{
    /**
     * @covers SubscriptionService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            SubscriptionService::class,
            $this->client->subscriptions()
        );
    }

    /**
     * @covers SubscriptionService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->subscriptions()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            SubscriptionCollection::class,
            $result
        );
    }

    /**
     * @covers SubscriptionCollection
     */
    public function test_collection_contains_subscription_entities()
    {
        $result = $this->client->subscriptions()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                SubscriptionEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers SubscriptionService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            SubscriptionQueryBuilder::class,
            $this->client->subscriptions()->query()
        );
    }
}
