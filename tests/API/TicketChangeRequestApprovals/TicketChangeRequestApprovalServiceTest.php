<?php

use Anteris\Autotask\API\TicketChangeRequestApprovals\TicketChangeRequestApprovalCollection;
use Anteris\Autotask\API\TicketChangeRequestApprovals\TicketChangeRequestApprovalEntity;
use Anteris\Autotask\API\TicketChangeRequestApprovals\TicketChangeRequestApprovalService;
use Anteris\Autotask\API\TicketChangeRequestApprovals\TicketChangeRequestApprovalQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TicketChangeRequestApprovalService.
 */
class TicketChangeRequestApprovalServiceTest extends AbstractTest
{
    /**
     * @covers TicketChangeRequestApprovalService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketChangeRequestApprovalService::class,
            $this->client->ticketChangeRequestApprovals()
        );
    }

    /**
     * @covers TicketChangeRequestApprovalService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->ticketChangeRequestApprovals()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TicketChangeRequestApprovalCollection::class,
            $result
        );
    }

    /**
     * @covers TicketChangeRequestApprovalCollection
     */
    public function test_collection_contains_ticket_change_request_approval_entities()
    {
        $result = $this->client->ticketChangeRequestApprovals()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TicketChangeRequestApprovalEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TicketChangeRequestApprovalService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TicketChangeRequestApprovalQueryBuilder::class,
            $this->client->ticketChangeRequestApprovals()->query()
        );
    }
}
