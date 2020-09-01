<?php

use Anteris\Autotask\API\ContractExclusionRoles\ContractExclusionRoleCollection;
use Anteris\Autotask\API\ContractExclusionRoles\ContractExclusionRoleEntity;
use Anteris\Autotask\API\ContractExclusionRoles\ContractExclusionRoleService;
use Anteris\Autotask\API\ContractExclusionRoles\ContractExclusionRoleQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractExclusionRoleService.
 */
class ContractExclusionRoleServiceTest extends AbstractTest
{
    /**
     * @covers ContractExclusionRoleService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractExclusionRoleService::class,
            $this->client->contractExclusionRoles()
        );
    }

    /**
     * @covers ContractExclusionRoleService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractExclusionRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractExclusionRoleCollection::class,
            $result
        );
    }

    /**
     * @covers ContractExclusionRoleCollection
     */
    public function test_collection_contains_contract_exclusion_role_entities()
    {
        $result = $this->client->contractExclusionRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractExclusionRoleEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractExclusionRoleService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractExclusionRoleQueryBuilder::class,
            $this->client->contractExclusionRoles()->query()
        );
    }
}
