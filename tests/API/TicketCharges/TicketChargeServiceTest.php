<?php

use Anteris\Autotask\API\TicketCharges\TicketChargeCollection;
use Anteris\Autotask\API\TicketCharges\TicketChargeEntity;
use Anteris\Autotask\API\TicketCharges\TicketChargeService;
use Anteris\Autotask\API\TicketCharges\TicketChargeQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketChargeService.
 */
class TicketChargeServiceTest extends AbstractTest
{
    /**
     * @covers TicketChargeService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketChargeService::class,
            $this->client->ticketCharges()
        );
    }

    /**
     * @covers TicketChargeService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketCharges()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketChargeCollection::class,
            $result
        );
    }

    /**
     * @covers TicketChargeCollection
     */
    public function test_collection_contains_ticket_charge_entities()
    {
        $result = $this->client->ticketCharges()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketChargeEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketChargeService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketChargeQueryBuilder::class,
            $this->client->ticketCharges()->query()
        );
    }
}
