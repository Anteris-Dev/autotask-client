<?php

use Anteris\Autotask\API\Roles\RoleCollection;
use Anteris\Autotask\API\Roles\RoleEntity;
use Anteris\Autotask\API\Roles\RoleService;
use Anteris\Autotask\API\Roles\RoleQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for RoleService.
 */
class RoleServiceTest extends AbstractTest
{
    /**
     * @covers RoleService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            RoleService::class,
            $this->client->roles()
        );
    }

    /**
     * @covers RoleService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->roles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            RoleCollection::class,
            $result
        );
    }

    /**
     * @covers RoleCollection
     */
    public function test_collection_contains_role_entities()
    {
        $result = $this->client->roles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                RoleEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers RoleService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            RoleQueryBuilder::class,
            $this->client->roles()->query()
        );
    }
}
