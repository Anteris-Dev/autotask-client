<?php

use Anteris\Autotask\API\DocumentPlainTextContent\DocumentPlainTextContentCollection;
use Anteris\Autotask\API\DocumentPlainTextContent\DocumentPlainTextContentEntity;
use Anteris\Autotask\API\DocumentPlainTextContent\DocumentPlainTextContentService;
use Anteris\Autotask\API\DocumentPlainTextContent\DocumentPlainTextContentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DocumentPlainTextContentService.
 */
class DocumentPlainTextContentServiceTest extends AbstractTest
{
    /**
     * @covers DocumentPlainTextContentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DocumentPlainTextContentService::class,
            $this->client->documentPlainTextContent()
        );
    }

    /**
     * @covers DocumentPlainTextContentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->documentPlainTextContent()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DocumentPlainTextContentCollection::class,
            $result
        );
    }

    /**
     * @covers DocumentPlainTextContentCollection
     */
    public function test_collection_contains_document_plain_text_content_entities()
    {
        $result = $this->client->documentPlainTextContent()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DocumentPlainTextContentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DocumentPlainTextContentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DocumentPlainTextContentQueryBuilder::class,
            $this->client->documentPlainTextContent()->query()
        );
    }
}
