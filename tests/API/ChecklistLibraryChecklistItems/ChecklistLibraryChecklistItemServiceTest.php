<?php

use Anteris\Autotask\API\ChecklistLibraryChecklistItems\ChecklistLibraryChecklistItemCollection;
use Anteris\Autotask\API\ChecklistLibraryChecklistItems\ChecklistLibraryChecklistItemEntity;
use Anteris\Autotask\API\ChecklistLibraryChecklistItems\ChecklistLibraryChecklistItemService;
use Anteris\Autotask\API\ChecklistLibraryChecklistItems\ChecklistLibraryChecklistItemQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ChecklistLibraryChecklistItemService.
 */
class ChecklistLibraryChecklistItemServiceTest extends AbstractTest
{
    /**
     * @covers ChecklistLibraryChecklistItemService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ChecklistLibraryChecklistItemService::class,
            $this->client->checklistLibraryChecklistItems()
        );
    }

    /**
     * @covers ChecklistLibraryChecklistItemService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->checklistLibraryChecklistItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ChecklistLibraryChecklistItemCollection::class,
            $result
        );
    }

    /**
     * @covers ChecklistLibraryChecklistItemCollection
     */
    public function test_collection_contains_checklist_library_checklist_item_entities()
    {
        $result = $this->client->checklistLibraryChecklistItems()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ChecklistLibraryChecklistItemEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ChecklistLibraryChecklistItemService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ChecklistLibraryChecklistItemQueryBuilder::class,
            $this->client->checklistLibraryChecklistItems()->query()
        );
    }
}
