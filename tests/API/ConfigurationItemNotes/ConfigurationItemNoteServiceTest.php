<?php

use Anteris\Autotask\API\ConfigurationItemNotes\ConfigurationItemNoteCollection;
use Anteris\Autotask\API\ConfigurationItemNotes\ConfigurationItemNoteEntity;
use Anteris\Autotask\API\ConfigurationItemNotes\ConfigurationItemNoteService;
use Anteris\Autotask\API\ConfigurationItemNotes\ConfigurationItemNoteQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemNoteService.
 */
class ConfigurationItemNoteServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemNoteService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemNoteService::class,
            $this->client->configurationItemNotes()
        );
    }

    /**
     * @covers ConfigurationItemNoteService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->configurationItemNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ConfigurationItemNoteCollection::class,
            $result
        );
    }

    /**
     * @covers ConfigurationItemNoteCollection
     */
    public function test_collection_contains_configuration_item_note_entities()
    {
        $result = $this->client->configurationItemNotes()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ConfigurationItemNoteEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ConfigurationItemNoteService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ConfigurationItemNoteQueryBuilder::class,
            $this->client->configurationItemNotes()->query()
        );
    }
}
