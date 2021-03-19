<?php

use Anteris\Autotask\API\TagGroups\TagGroupCollection;
use Anteris\Autotask\API\TagGroups\TagGroupEntity;
use Anteris\Autotask\API\TagGroups\TagGroupService;
use Anteris\Autotask\API\TagGroups\TagGroupQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for TagGroupService.
 */
class TagGroupServiceTest extends AbstractTest
{
    /**
     * @covers TagGroupService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TagGroupService::class,
            $this->client->tagGroups()
        );
    }

    /**
     * @covers TagGroupService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->tagGroups()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            TagGroupCollection::class,
            $result
        );
    }

    /**
     * @covers TagGroupCollection
     */
    public function test_collection_contains_tag_group_entities()
    {
        $result = $this->client->tagGroups()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                TagGroupEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers TagGroupService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            TagGroupQueryBuilder::class,
            $this->client->tagGroups()->query()
        );
    }
}
