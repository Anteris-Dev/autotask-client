<?php

use Anteris\Autotask\API\TimeEntries\TimeEntryCollection;
use Anteris\Autotask\API\TimeEntries\TimeEntryEntity;
use Anteris\Autotask\API\TimeEntries\TimeEntryService;
use Anteris\Autotask\API\TimeEntries\TimeEntryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TimeEntryService.
 */
class TimeEntryServiceTest extends AbstractTest
{
    /**
     * @covers TimeEntryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TimeEntryService::class,
            $this->client->timeEntries()
        );
    }

    /**
     * @covers TimeEntryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->timeEntries()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TimeEntryCollection::class,
            $result
        );
    }

    /**
     * @covers TimeEntryCollection
     */
    public function test_collection_contains_time_entry_entities()
    {
        $result = $this->client->timeEntries()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TimeEntryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TimeEntryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TimeEntryQueryBuilder::class,
            $this->client->timeEntries()->query()
        );
    }
}
