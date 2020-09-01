<?php

use Anteris\Autotask\API\TicketSecondaryResources\TicketSecondaryResourceCollection;
use Anteris\Autotask\API\TicketSecondaryResources\TicketSecondaryResourceEntity;
use Anteris\Autotask\API\TicketSecondaryResources\TicketSecondaryResourceService;
use Anteris\Autotask\API\TicketSecondaryResources\TicketSecondaryResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketSecondaryResourceService.
 */
class TicketSecondaryResourceServiceTest extends AbstractTest
{
    /**
     * @covers TicketSecondaryResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketSecondaryResourceService::class,
            $this->client->ticketSecondaryResources()
        );
    }

    /**
     * @covers TicketSecondaryResourceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketSecondaryResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketSecondaryResourceCollection::class,
            $result
        );
    }

    /**
     * @covers TicketSecondaryResourceCollection
     */
    public function test_collection_contains_ticket_secondary_resource_entities()
    {
        $result = $this->client->ticketSecondaryResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketSecondaryResourceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketSecondaryResourceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketSecondaryResourceQueryBuilder::class,
            $this->client->ticketSecondaryResources()->query()
        );
    }
}
