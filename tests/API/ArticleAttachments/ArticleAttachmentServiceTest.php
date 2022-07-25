<?php

use Anteris\Autotask\API\ArticleAttachments\ArticleAttachmentCollection;
use Anteris\Autotask\API\ArticleAttachments\ArticleAttachmentEntity;
use Anteris\Autotask\API\ArticleAttachments\ArticleAttachmentService;
use Anteris\Autotask\API\ArticleAttachments\ArticleAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ArticleAttachmentService.
 */
class ArticleAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers ArticleAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ArticleAttachmentService::class,
            $this->client->articleAttachments()
        );
    }

    /**
     * @covers ArticleAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->articleAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ArticleAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers ArticleAttachmentCollection
     */
    public function test_collection_contains_article_attachment_entities()
    {
        $result = $this->client->articleAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ArticleAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ArticleAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ArticleAttachmentQueryBuilder::class,
            $this->client->articleAttachments()->query()
        );
    }
}
