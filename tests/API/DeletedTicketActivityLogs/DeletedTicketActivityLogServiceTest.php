<?php

use Anteris\Autotask\API\DeletedTicketActivityLogs\DeletedTicketActivityLogCollection;
use Anteris\Autotask\API\DeletedTicketActivityLogs\DeletedTicketActivityLogEntity;
use Anteris\Autotask\API\DeletedTicketActivityLogs\DeletedTicketActivityLogService;
use Anteris\Autotask\API\DeletedTicketActivityLogs\DeletedTicketActivityLogQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DeletedTicketActivityLogService.
 */
class DeletedTicketActivityLogServiceTest extends AbstractTest
{
    /**
     * @covers DeletedTicketActivityLogService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DeletedTicketActivityLogService::class,
            $this->client->deletedTicketActivityLogs()
        );
    }

    /**
     * @covers DeletedTicketActivityLogService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->deletedTicketActivityLogs()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DeletedTicketActivityLogCollection::class,
            $result
        );
    }

    /**
     * @covers DeletedTicketActivityLogCollection
     */
    public function test_collection_contains_deleted_ticket_activity_log_entities()
    {
        $result = $this->client->deletedTicketActivityLogs()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DeletedTicketActivityLogEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DeletedTicketActivityLogService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DeletedTicketActivityLogQueryBuilder::class,
            $this->client->deletedTicketActivityLogs()->query()
        );
    }
}
