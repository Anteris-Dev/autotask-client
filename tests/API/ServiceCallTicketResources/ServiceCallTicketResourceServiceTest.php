<?php

use Anteris\Autotask\API\ServiceCallTicketResources\ServiceCallTicketResourceCollection;
use Anteris\Autotask\API\ServiceCallTicketResources\ServiceCallTicketResourceEntity;
use Anteris\Autotask\API\ServiceCallTicketResources\ServiceCallTicketResourceService;
use Anteris\Autotask\API\ServiceCallTicketResources\ServiceCallTicketResourceQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ServiceCallTicketResourceService.
 */
class ServiceCallTicketResourceServiceTest extends AbstractTest
{
    /**
     * @covers ServiceCallTicketResourceService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ServiceCallTicketResourceService::class,
            $this->client->serviceCallTicketResources()
        );
    }

    /**
     * @covers ServiceCallTicketResourceService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->serviceCallTicketResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ServiceCallTicketResourceCollection::class,
            $result
        );
    }

    /**
     * @covers ServiceCallTicketResourceCollection
     */
    public function test_collection_contains_service_call_ticket_resource_entities()
    {
        $result = $this->client->serviceCallTicketResources()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ServiceCallTicketResourceEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ServiceCallTicketResourceService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ServiceCallTicketResourceQueryBuilder::class,
            $this->client->serviceCallTicketResources()->query()
        );
    }
}
