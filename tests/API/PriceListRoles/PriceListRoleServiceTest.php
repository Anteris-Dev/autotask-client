<?php

use Anteris\Autotask\API\PriceListRoles\PriceListRoleCollection;
use Anteris\Autotask\API\PriceListRoles\PriceListRoleEntity;
use Anteris\Autotask\API\PriceListRoles\PriceListRoleService;
use Anteris\Autotask\API\PriceListRoles\PriceListRoleQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PriceListRoleService.
 */
class PriceListRoleServiceTest extends AbstractTest
{
    /**
     * @covers PriceListRoleService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PriceListRoleService::class,
            $this->client->priceListRoles()
        );
    }

    /**
     * @covers PriceListRoleService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->priceListRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PriceListRoleCollection::class,
            $result
        );
    }

    /**
     * @covers PriceListRoleCollection
     */
    public function test_collection_contains_price_list_role_entities()
    {
        $result = $this->client->priceListRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PriceListRoleEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PriceListRoleService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PriceListRoleQueryBuilder::class,
            $this->client->priceListRoles()->query()
        );
    }
}
