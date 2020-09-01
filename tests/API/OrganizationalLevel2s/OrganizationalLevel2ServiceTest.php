<?php

use Anteris\Autotask\API\OrganizationalLevel2s\OrganizationalLevel2Collection;
use Anteris\Autotask\API\OrganizationalLevel2s\OrganizationalLevel2Entity;
use Anteris\Autotask\API\OrganizationalLevel2s\OrganizationalLevel2Service;
use Anteris\Autotask\API\OrganizationalLevel2s\OrganizationalLevel2QueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for OrganizationalLevel2Service.
 */
class OrganizationalLevel2ServiceTest extends AbstractTest
{
    /**
     * @covers OrganizationalLevel2Service
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            OrganizationalLevel2Service::class,
            $this->client->organizationalLevel2s()
        );
    }

    /**
     * @covers OrganizationalLevel2Service
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->organizationalLevel2s()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            OrganizationalLevel2Collection::class,
            $result
        );
    }

    /**
     * @covers OrganizationalLevel2Collection
     */
    public function test_collection_contains_organizational_level2_entities()
    {
        $result = $this->client->organizationalLevel2s()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                OrganizationalLevel2Entity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers OrganizationalLevel2Service
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            OrganizationalLevel2QueryBuilder::class,
            $this->client->organizationalLevel2s()->query()
        );
    }
}
