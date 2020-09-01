<?php

use Anteris\Autotask\API\UserDefinedFieldListItems\UserDefinedFieldListItemCollection;
use Anteris\Autotask\API\UserDefinedFieldListItems\UserDefinedFieldListItemEntity;
use Anteris\Autotask\API\UserDefinedFieldListItems\UserDefinedFieldListItemService;
use Anteris\Autotask\API\UserDefinedFieldListItems\UserDefinedFieldListItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for UserDefinedFieldListItemService.
 */
class UserDefinedFieldListItemServiceTest extends AbstractTest
{
    /**
     * @covers UserDefinedFieldListItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            UserDefinedFieldListItemService::class,
            $this->client->userDefinedFieldListItems()
        );
    }

    /**
     * @covers UserDefinedFieldListItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->userDefinedFieldListItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            UserDefinedFieldListItemCollection::class,
            $result
        );
    }

    /**
     * @covers UserDefinedFieldListItemCollection
     */
    public function test_collection_contains_user_defined_field_list_item_entities()
    {
        $result = $this->client->userDefinedFieldListItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                UserDefinedFieldListItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers UserDefinedFieldListItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            UserDefinedFieldListItemQueryBuilder::class,
            $this->client->userDefinedFieldListItems()->query()
        );
    }
}
