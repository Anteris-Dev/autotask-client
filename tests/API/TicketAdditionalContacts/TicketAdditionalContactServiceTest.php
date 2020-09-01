<?php

use Anteris\Autotask\API\TicketAdditionalContacts\TicketAdditionalContactCollection;
use Anteris\Autotask\API\TicketAdditionalContacts\TicketAdditionalContactEntity;
use Anteris\Autotask\API\TicketAdditionalContacts\TicketAdditionalContactService;
use Anteris\Autotask\API\TicketAdditionalContacts\TicketAdditionalContactQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketAdditionalContactService.
 */
class TicketAdditionalContactServiceTest extends AbstractTest
{
    /**
     * @covers TicketAdditionalContactService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketAdditionalContactService::class,
            $this->client->ticketAdditionalContacts()
        );
    }

    /**
     * @covers TicketAdditionalContactService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketAdditionalContacts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketAdditionalContactCollection::class,
            $result
        );
    }

    /**
     * @covers TicketAdditionalContactCollection
     */
    public function test_collection_contains_ticket_additional_contact_entities()
    {
        $result = $this->client->ticketAdditionalContacts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketAdditionalContactEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketAdditionalContactService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketAdditionalContactQueryBuilder::class,
            $this->client->ticketAdditionalContacts()->query()
        );
    }
}
