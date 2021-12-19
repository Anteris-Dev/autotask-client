<?php

use Anteris\Autotask\API\ArticleConfigurationItemCategoryAssociations\ArticleConfigurationItemCategoryAssociationCollection;
use Anteris\Autotask\API\ArticleConfigurationItemCategoryAssociations\ArticleConfigurationItemCategoryAssociationEntity;
use Anteris\Autotask\API\ArticleConfigurationItemCategoryAssociations\ArticleConfigurationItemCategoryAssociationService;
use Anteris\Autotask\API\ArticleConfigurationItemCategoryAssociations\ArticleConfigurationItemCategoryAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ArticleConfigurationItemCategoryAssociationService.
 */
class ArticleConfigurationItemCategoryAssociationServiceTest extends AbstractTest
{
    /**
     * @covers ArticleConfigurationItemCategoryAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ArticleConfigurationItemCategoryAssociationService::class,
            $this->client->articleConfigurationItemCategoryAssociations()
        );
    }

    /**
     * @covers ArticleConfigurationItemCategoryAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->articleConfigurationItemCategoryAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ArticleConfigurationItemCategoryAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers ArticleConfigurationItemCategoryAssociationCollection
     */
    public function test_collection_contains_article_configuration_item_category_association_entities()
    {
        $result = $this->client->articleConfigurationItemCategoryAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ArticleConfigurationItemCategoryAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ArticleConfigurationItemCategoryAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ArticleConfigurationItemCategoryAssociationQueryBuilder::class,
            $this->client->articleConfigurationItemCategoryAssociations()->query()
        );
    }
}
