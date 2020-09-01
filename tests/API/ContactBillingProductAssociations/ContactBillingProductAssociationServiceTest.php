<?php

use Anteris\Autotask\API\ContactBillingProductAssociations\ContactBillingProductAssociationCollection;
use Anteris\Autotask\API\ContactBillingProductAssociations\ContactBillingProductAssociationEntity;
use Anteris\Autotask\API\ContactBillingProductAssociations\ContactBillingProductAssociationService;
use Anteris\Autotask\API\ContactBillingProductAssociations\ContactBillingProductAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContactBillingProductAssociationService.
 */
class ContactBillingProductAssociationServiceTest extends AbstractTest
{
    /**
     * @covers ContactBillingProductAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContactBillingProductAssociationService::class,
            $this->client->contactBillingProductAssociations()
        );
    }

    /**
     * @covers ContactBillingProductAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contactBillingProductAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContactBillingProductAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers ContactBillingProductAssociationCollection
     */
    public function test_collection_contains_contact_billing_product_association_entities()
    {
        $result = $this->client->contactBillingProductAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContactBillingProductAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContactBillingProductAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContactBillingProductAssociationQueryBuilder::class,
            $this->client->contactBillingProductAssociations()->query()
        );
    }
}
