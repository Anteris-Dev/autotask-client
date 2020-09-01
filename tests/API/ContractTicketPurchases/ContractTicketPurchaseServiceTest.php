<?php

use Anteris\Autotask\API\ContractTicketPurchases\ContractTicketPurchaseCollection;
use Anteris\Autotask\API\ContractTicketPurchases\ContractTicketPurchaseEntity;
use Anteris\Autotask\API\ContractTicketPurchases\ContractTicketPurchaseService;
use Anteris\Autotask\API\ContractTicketPurchases\ContractTicketPurchaseQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractTicketPurchaseService.
 */
class ContractTicketPurchaseServiceTest extends AbstractTest
{
    /**
     * @covers ContractTicketPurchaseService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractTicketPurchaseService::class,
            $this->client->contractTicketPurchases()
        );
    }

    /**
     * @covers ContractTicketPurchaseService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractTicketPurchases()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractTicketPurchaseCollection::class,
            $result
        );
    }

    /**
     * @covers ContractTicketPurchaseCollection
     */
    public function test_collection_contains_contract_ticket_purchase_entities()
    {
        $result = $this->client->contractTicketPurchases()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractTicketPurchaseEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractTicketPurchaseService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractTicketPurchaseQueryBuilder::class,
            $this->client->contractTicketPurchases()->query()
        );
    }
}
