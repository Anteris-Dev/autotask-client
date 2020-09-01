<?php

use Anteris\Autotask\API\PurchaseApprovals\PurchaseApprovalCollection;
use Anteris\Autotask\API\PurchaseApprovals\PurchaseApprovalEntity;
use Anteris\Autotask\API\PurchaseApprovals\PurchaseApprovalService;
use Anteris\Autotask\API\PurchaseApprovals\PurchaseApprovalQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PurchaseApprovalService.
 */
class PurchaseApprovalServiceTest extends AbstractTest
{
    /**
     * @covers PurchaseApprovalService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PurchaseApprovalService::class,
            $this->client->purchaseApprovals()
        );
    }

    /**
     * @covers PurchaseApprovalService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->purchaseApprovals()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PurchaseApprovalCollection::class,
            $result
        );
    }

    /**
     * @covers PurchaseApprovalCollection
     */
    public function test_collection_contains_purchase_approval_entities()
    {
        $result = $this->client->purchaseApprovals()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PurchaseApprovalEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PurchaseApprovalService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PurchaseApprovalQueryBuilder::class,
            $this->client->purchaseApprovals()->query()
        );
    }
}
