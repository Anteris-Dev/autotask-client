<?php

use Anteris\Autotask\API\ComanagedAssociations\ComanagedAssociationCollection;
use Anteris\Autotask\API\ComanagedAssociations\ComanagedAssociationEntity;
use Anteris\Autotask\API\ComanagedAssociations\ComanagedAssociationService;
use Anteris\Autotask\API\ComanagedAssociations\ComanagedAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ComanagedAssociationService.
 */
class ComanagedAssociationServiceTest extends AbstractTest
{
    /**
     * @covers ComanagedAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ComanagedAssociationService::class,
            $this->client->comanagedAssociations()
        );
    }

    /**
     * @covers ComanagedAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->comanagedAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ComanagedAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers ComanagedAssociationCollection
     */
    public function test_collection_contains_comanaged_association_entities()
    {
        $result = $this->client->comanagedAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ComanagedAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ComanagedAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ComanagedAssociationQueryBuilder::class,
            $this->client->comanagedAssociations()->query()
        );
    }
}
