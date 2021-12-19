<?php

use Anteris\Autotask\API\ArticleTagAssociations\ArticleTagAssociationCollection;
use Anteris\Autotask\API\ArticleTagAssociations\ArticleTagAssociationEntity;
use Anteris\Autotask\API\ArticleTagAssociations\ArticleTagAssociationService;
use Anteris\Autotask\API\ArticleTagAssociations\ArticleTagAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ArticleTagAssociationService.
 */
class ArticleTagAssociationServiceTest extends AbstractTest
{
    /**
     * @covers ArticleTagAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ArticleTagAssociationService::class,
            $this->client->articleTagAssociations()
        );
    }

    /**
     * @covers ArticleTagAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->articleTagAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ArticleTagAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers ArticleTagAssociationCollection
     */
    public function test_collection_contains_article_tag_association_entities()
    {
        $result = $this->client->articleTagAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ArticleTagAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ArticleTagAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ArticleTagAssociationQueryBuilder::class,
            $this->client->articleTagAssociations()->query()
        );
    }
}
