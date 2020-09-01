<?php

use Anteris\Autotask\API\BillingItems\BillingItemCollection;
use Anteris\Autotask\API\BillingItems\BillingItemEntity;
use Anteris\Autotask\API\BillingItems\BillingItemService;
use Anteris\Autotask\API\BillingItems\BillingItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for BillingItemService.
 */
class BillingItemServiceTest extends AbstractTest
{
    /**
     * @covers BillingItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            BillingItemService::class,
            $this->client->billingItems()
        );
    }

    /**
     * @covers BillingItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->billingItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            BillingItemCollection::class,
            $result
        );
    }

    /**
     * @covers BillingItemCollection
     */
    public function test_collection_contains_billing_item_entities()
    {
        $result = $this->client->billingItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                BillingItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers BillingItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            BillingItemQueryBuilder::class,
            $this->client->billingItems()->query()
        );
    }
}
