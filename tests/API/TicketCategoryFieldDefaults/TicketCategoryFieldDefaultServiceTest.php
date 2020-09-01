<?php

use Anteris\Autotask\API\TicketCategoryFieldDefaults\TicketCategoryFieldDefaultCollection;
use Anteris\Autotask\API\TicketCategoryFieldDefaults\TicketCategoryFieldDefaultEntity;
use Anteris\Autotask\API\TicketCategoryFieldDefaults\TicketCategoryFieldDefaultService;
use Anteris\Autotask\API\TicketCategoryFieldDefaults\TicketCategoryFieldDefaultQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketCategoryFieldDefaultService.
 */
class TicketCategoryFieldDefaultServiceTest extends AbstractTest
{
    /**
     * @covers TicketCategoryFieldDefaultService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketCategoryFieldDefaultService::class,
            $this->client->ticketCategoryFieldDefaults()
        );
    }

    /**
     * @covers TicketCategoryFieldDefaultService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketCategoryFieldDefaults()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketCategoryFieldDefaultCollection::class,
            $result
        );
    }

    /**
     * @covers TicketCategoryFieldDefaultCollection
     */
    public function test_collection_contains_ticket_category_field_default_entities()
    {
        $result = $this->client->ticketCategoryFieldDefaults()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketCategoryFieldDefaultEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketCategoryFieldDefaultService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketCategoryFieldDefaultQueryBuilder::class,
            $this->client->ticketCategoryFieldDefaults()->query()
        );
    }
}
