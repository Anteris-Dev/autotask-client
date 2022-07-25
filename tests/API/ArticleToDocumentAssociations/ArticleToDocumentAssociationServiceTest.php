<?php

use Anteris\Autotask\API\ArticleToDocumentAssociations\ArticleToDocumentAssociationCollection;
use Anteris\Autotask\API\ArticleToDocumentAssociations\ArticleToDocumentAssociationEntity;
use Anteris\Autotask\API\ArticleToDocumentAssociations\ArticleToDocumentAssociationService;
use Anteris\Autotask\API\ArticleToDocumentAssociations\ArticleToDocumentAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ArticleToDocumentAssociationService.
 */
class ArticleToDocumentAssociationServiceTest extends AbstractTest
{
    /**
     * @covers ArticleToDocumentAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ArticleToDocumentAssociationService::class,
            $this->client->articleToDocumentAssociations()
        );
    }

    /**
     * @covers ArticleToDocumentAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->articleToDocumentAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ArticleToDocumentAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers ArticleToDocumentAssociationCollection
     */
    public function test_collection_contains_article_to_document_association_entities()
    {
        $result = $this->client->articleToDocumentAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ArticleToDocumentAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ArticleToDocumentAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ArticleToDocumentAssociationQueryBuilder::class,
            $this->client->articleToDocumentAssociations()->query()
        );
    }
}
