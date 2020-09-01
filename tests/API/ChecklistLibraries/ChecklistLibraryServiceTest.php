<?php

use Anteris\Autotask\API\ChecklistLibraries\ChecklistLibraryCollection;
use Anteris\Autotask\API\ChecklistLibraries\ChecklistLibraryEntity;
use Anteris\Autotask\API\ChecklistLibraries\ChecklistLibraryService;
use Anteris\Autotask\API\ChecklistLibraries\ChecklistLibraryQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ChecklistLibraryService.
 */
class ChecklistLibraryServiceTest extends AbstractTest
{
    /**
     * @covers ChecklistLibraryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ChecklistLibraryService::class,
            $this->client->checklistLibraries()
        );
    }

    /**
     * @covers ChecklistLibraryService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->checklistLibraries()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ChecklistLibraryCollection::class,
            $result
        );
    }

    /**
     * @covers ChecklistLibraryCollection
     */
    public function test_collection_contains_checklist_library_entities()
    {
        $result = $this->client->checklistLibraries()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ChecklistLibraryEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ChecklistLibraryService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ChecklistLibraryQueryBuilder::class,
            $this->client->checklistLibraries()->query()
        );
    }
}
