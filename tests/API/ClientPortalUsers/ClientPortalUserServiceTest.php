<?php

use Anteris\Autotask\API\ClientPortalUsers\ClientPortalUserCollection;
use Anteris\Autotask\API\ClientPortalUsers\ClientPortalUserEntity;
use Anteris\Autotask\API\ClientPortalUsers\ClientPortalUserService;
use Anteris\Autotask\API\ClientPortalUsers\ClientPortalUserQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ClientPortalUserService.
 */
class ClientPortalUserServiceTest extends AbstractTest
{
    /**
     * @covers ClientPortalUserService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ClientPortalUserService::class,
            $this->client->clientPortalUsers()
        );
    }

    /**
     * @covers ClientPortalUserService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->clientPortalUsers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ClientPortalUserCollection::class,
            $result
        );
    }

    /**
     * @covers ClientPortalUserCollection
     */
    public function test_collection_contains_client_portal_user_entities()
    {
        $result = $this->client->clientPortalUsers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ClientPortalUserEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ClientPortalUserService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ClientPortalUserQueryBuilder::class,
            $this->client->clientPortalUsers()->query()
        );
    }
}
