<?php

use Anteris\Autotask\API\ContactGroupContacts\ContactGroupContactCollection;
use Anteris\Autotask\API\ContactGroupContacts\ContactGroupContactEntity;
use Anteris\Autotask\API\ContactGroupContacts\ContactGroupContactService;
use Anteris\Autotask\API\ContactGroupContacts\ContactGroupContactQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContactGroupContactService.
 */
class ContactGroupContactServiceTest extends AbstractTest
{
    /**
     * @covers ContactGroupContactService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContactGroupContactService::class,
            $this->client->contactGroupContacts()
        );
    }

    /**
     * @covers ContactGroupContactService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contactGroupContacts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContactGroupContactCollection::class,
            $result
        );
    }

    /**
     * @covers ContactGroupContactCollection
     */
    public function test_collection_contains_contact_group_contact_entities()
    {
        $result = $this->client->contactGroupContacts()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContactGroupContactEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContactGroupContactService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContactGroupContactQueryBuilder::class,
            $this->client->contactGroupContacts()->query()
        );
    }
}
