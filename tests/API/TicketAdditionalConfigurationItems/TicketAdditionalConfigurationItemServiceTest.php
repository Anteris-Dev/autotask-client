<?php

use Anteris\Autotask\API\TicketAdditionalConfigurationItems\TicketAdditionalConfigurationItemCollection;
use Anteris\Autotask\API\TicketAdditionalConfigurationItems\TicketAdditionalConfigurationItemEntity;
use Anteris\Autotask\API\TicketAdditionalConfigurationItems\TicketAdditionalConfigurationItemService;
use Anteris\Autotask\API\TicketAdditionalConfigurationItems\TicketAdditionalConfigurationItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketAdditionalConfigurationItemService.
 */
class TicketAdditionalConfigurationItemServiceTest extends AbstractTest
{
    /**
     * @covers TicketAdditionalConfigurationItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketAdditionalConfigurationItemService::class,
            $this->client->ticketAdditionalConfigurationItems()
        );
    }

    /**
     * @covers TicketAdditionalConfigurationItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketAdditionalConfigurationItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketAdditionalConfigurationItemCollection::class,
            $result
        );
    }

    /**
     * @covers TicketAdditionalConfigurationItemCollection
     */
    public function test_collection_contains_ticket_additional_configuration_item_entities()
    {
        $result = $this->client->ticketAdditionalConfigurationItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketAdditionalConfigurationItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketAdditionalConfigurationItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketAdditionalConfigurationItemQueryBuilder::class,
            $this->client->ticketAdditionalConfigurationItems()->query()
        );
    }
}
