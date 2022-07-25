<?php

use Anteris\Autotask\API\ArticlePlainTextContent\ArticlePlainTextContentCollection;
use Anteris\Autotask\API\ArticlePlainTextContent\ArticlePlainTextContentEntity;
use Anteris\Autotask\API\ArticlePlainTextContent\ArticlePlainTextContentService;
use Anteris\Autotask\API\ArticlePlainTextContent\ArticlePlainTextContentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ArticlePlainTextContentService.
 */
class ArticlePlainTextContentServiceTest extends AbstractTest
{
    /**
     * @covers ArticlePlainTextContentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ArticlePlainTextContentService::class,
            $this->client->articlePlainTextContent()
        );
    }

    /**
     * @covers ArticlePlainTextContentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->articlePlainTextContent()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ArticlePlainTextContentCollection::class,
            $result
        );
    }

    /**
     * @covers ArticlePlainTextContentCollection
     */
    public function test_collection_contains_article_plain_text_content_entities()
    {
        $result = $this->client->articlePlainTextContent()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ArticlePlainTextContentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ArticlePlainTextContentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ArticlePlainTextContentQueryBuilder::class,
            $this->client->articlePlainTextContent()->query()
        );
    }
}
