<?php

use Anteris\Autotask\API\ProductNotes\ProductNoteCollection;
use Anteris\Autotask\API\ProductNotes\ProductNoteEntity;
use Anteris\Autotask\API\ProductNotes\ProductNoteService;
use Anteris\Autotask\API\ProductNotes\ProductNoteQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ProductNoteService.
 */
class ProductNoteServiceTest extends AbstractTest
{
    /**
     * @covers ProductNoteService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ProductNoteService::class,
            $this->client->productNotes()
        );
    }

    /**
     * @covers ProductNoteService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->productNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ProductNoteCollection::class,
            $result
        );
    }

    /**
     * @covers ProductNoteCollection
     */
    public function test_collection_contains_product_note_entities()
    {
        $result = $this->client->productNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ProductNoteEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ProductNoteService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ProductNoteQueryBuilder::class,
            $this->client->productNotes()->query()
        );
    }
}
