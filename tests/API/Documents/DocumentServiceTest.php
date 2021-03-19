<?php

use Anteris\Autotask\API\Documents\DocumentCollection;
use Anteris\Autotask\API\Documents\DocumentEntity;
use Anteris\Autotask\API\Documents\DocumentService;
use Anteris\Autotask\API\Documents\DocumentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DocumentService.
 */
class DocumentServiceTest extends AbstractTest
{
    /**
     * @covers DocumentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DocumentService::class,
            $this->client->documents()
        );
    }

    /**
     * @covers DocumentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->documents()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DocumentCollection::class,
            $result
        );
    }

    /**
     * @covers DocumentCollection
     */
    public function test_collection_contains_document_entities()
    {
        $result = $this->client->documents()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DocumentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DocumentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DocumentQueryBuilder::class,
            $this->client->documents()->query()
        );
    }
}
