<?php

use Anteris\Autotask\API\OrganizationalLevelAssociations\OrganizationalLevelAssociationCollection;
use Anteris\Autotask\API\OrganizationalLevelAssociations\OrganizationalLevelAssociationEntity;
use Anteris\Autotask\API\OrganizationalLevelAssociations\OrganizationalLevelAssociationService;
use Anteris\Autotask\API\OrganizationalLevelAssociations\OrganizationalLevelAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for OrganizationalLevelAssociationService.
 */
class OrganizationalLevelAssociationServiceTest extends AbstractTest
{
    /**
     * @covers OrganizationalLevelAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            OrganizationalLevelAssociationService::class,
            $this->client->organizationalLevelAssociations()
        );
    }

    /**
     * @covers OrganizationalLevelAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->organizationalLevelAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            OrganizationalLevelAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers OrganizationalLevelAssociationCollection
     */
    public function test_collection_contains_organizational_level_association_entities()
    {
        $result = $this->client->organizationalLevelAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                OrganizationalLevelAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers OrganizationalLevelAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            OrganizationalLevelAssociationQueryBuilder::class,
            $this->client->organizationalLevelAssociations()->query()
        );
    }
}
