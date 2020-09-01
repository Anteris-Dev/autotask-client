<?php

use Anteris\Autotask\API\ResourceRoles\ResourceRoleCollection;
use Anteris\Autotask\API\ResourceRoles\ResourceRoleEntity;
use Anteris\Autotask\API\ResourceRoles\ResourceRoleService;
use Anteris\Autotask\API\ResourceRoles\ResourceRoleQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ResourceRoleService.
 */
class ResourceRoleServiceTest extends AbstractTest
{
    /**
     * @covers ResourceRoleService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ResourceRoleService::class,
            $this->client->resourceRoles()
        );
    }

    /**
     * @covers ResourceRoleService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->resourceRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ResourceRoleCollection::class,
            $result
        );
    }

    /**
     * @covers ResourceRoleCollection
     */
    public function test_collection_contains_resource_role_entities()
    {
        $result = $this->client->resourceRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ResourceRoleEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ResourceRoleService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ResourceRoleQueryBuilder::class,
            $this->client->resourceRoles()->query()
        );
    }
}
