<?php

use Anteris\Autotask\API\Tickets\TicketCollection;
use Anteris\Autotask\API\Tickets\TicketEntity;
use Anteris\Autotask\API\Tickets\TicketService;
use Anteris\Autotask\API\Tickets\TicketQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketService.
 */
class TicketServiceTest extends AbstractTest
{
    /**
     * @covers TicketService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketService::class,
            $this->client->tickets()
        );
    }

    /**
     * @covers TicketService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->tickets()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketCollection::class,
            $result
        );
    }

    /**
     * @covers TicketCollection
     */
    public function test_collection_contains_ticket_entities()
    {
        $result = $this->client->tickets()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketQueryBuilder::class,
            $this->client->tickets()->query()
        );
    }
}
