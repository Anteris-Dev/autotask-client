<?php

use Anteris\Autotask\API\TicketTagAssociations\TicketTagAssociationCollection;
use Anteris\Autotask\API\TicketTagAssociations\TicketTagAssociationEntity;
use Anteris\Autotask\API\TicketTagAssociations\TicketTagAssociationService;
use Anteris\Autotask\API\TicketTagAssociations\TicketTagAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketTagAssociationService.
 */
class TicketTagAssociationServiceTest extends AbstractTest
{
    /**
     * @covers TicketTagAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketTagAssociationService::class,
            $this->client->ticketTagAssociations()
        );
    }

    /**
     * @covers TicketTagAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketTagAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketTagAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers TicketTagAssociationCollection
     */
    public function test_collection_contains_ticket_tag_association_entities()
    {
        $result = $this->client->ticketTagAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketTagAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketTagAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketTagAssociationQueryBuilder::class,
            $this->client->ticketTagAssociations()->query()
        );
    }
}
