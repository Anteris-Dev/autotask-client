<?php

use Anteris\Autotask\API\TimeOffRequests\TimeOffRequestCollection;
use Anteris\Autotask\API\TimeOffRequests\TimeOffRequestEntity;
use Anteris\Autotask\API\TimeOffRequests\TimeOffRequestService;
use Anteris\Autotask\API\TimeOffRequests\TimeOffRequestQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TimeOffRequestService.
 */
class TimeOffRequestServiceTest extends AbstractTest
{
    /**
     * @covers TimeOffRequestService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TimeOffRequestService::class,
            $this->client->timeOffRequests()
        );
    }

    /**
     * @covers TimeOffRequestService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->timeOffRequests()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TimeOffRequestCollection::class,
            $result
        );
    }

    /**
     * @covers TimeOffRequestCollection
     */
    public function test_collection_contains_time_off_request_entities()
    {
        $result = $this->client->timeOffRequests()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TimeOffRequestEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TimeOffRequestService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TimeOffRequestQueryBuilder::class,
            $this->client->timeOffRequests()->query()
        );
    }
}
