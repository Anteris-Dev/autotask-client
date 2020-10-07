<?php

use Anteris\Autotask\API\DeletedTicketLogs\DeletedTicketLogCollection;
use Anteris\Autotask\API\DeletedTicketLogs\DeletedTicketLogEntity;
use Anteris\Autotask\API\DeletedTicketLogs\DeletedTicketLogService;
use Anteris\Autotask\API\DeletedTicketLogs\DeletedTicketLogQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DeletedTicketLogService.
 */
class DeletedTicketLogServiceTest extends AbstractTest
{
    /**
     * @covers DeletedTicketLogService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DeletedTicketLogService::class,
            $this->client->deletedTicketLogs()
        );
    }

    /**
     * @covers DeletedTicketLogService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->deletedTicketLogs()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DeletedTicketLogCollection::class,
            $result
        );
    }

    /**
     * @covers DeletedTicketLogCollection
     */
    public function test_collection_contains_deleted_ticket_log_entities()
    {
        $result = $this->client->deletedTicketLogs()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DeletedTicketLogEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DeletedTicketLogService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DeletedTicketLogQueryBuilder::class,
            $this->client->deletedTicketLogs()->query()
        );
    }
}
