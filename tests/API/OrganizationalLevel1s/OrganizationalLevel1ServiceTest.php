<?php

use Anteris\Autotask\API\OrganizationalLevel1s\OrganizationalLevel1Collection;
use Anteris\Autotask\API\OrganizationalLevel1s\OrganizationalLevel1Entity;
use Anteris\Autotask\API\OrganizationalLevel1s\OrganizationalLevel1Service;
use Anteris\Autotask\API\OrganizationalLevel1s\OrganizationalLevel1QueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for OrganizationalLevel1Service.
 */
class OrganizationalLevel1ServiceTest extends AbstractTest
{
    /**
     * @covers OrganizationalLevel1Service
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            OrganizationalLevel1Service::class,
            $this->client->organizationalLevel1s()
        );
    }

    /**
     * @covers OrganizationalLevel1Service
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->organizationalLevel1s()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            OrganizationalLevel1Collection::class,
            $result
        );
    }

    /**
     * @covers OrganizationalLevel1Collection
     */
    public function test_collection_contains_organizational_level1_entities()
    {
        $result = $this->client->organizationalLevel1s()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                OrganizationalLevel1Entity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers OrganizationalLevel1Service
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            OrganizationalLevel1QueryBuilder::class,
            $this->client->organizationalLevel1s()->query()
        );
    }
}
