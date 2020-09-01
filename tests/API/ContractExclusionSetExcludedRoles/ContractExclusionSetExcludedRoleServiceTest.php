<?php

use Anteris\Autotask\API\ContractExclusionSetExcludedRoles\ContractExclusionSetExcludedRoleCollection;
use Anteris\Autotask\API\ContractExclusionSetExcludedRoles\ContractExclusionSetExcludedRoleEntity;
use Anteris\Autotask\API\ContractExclusionSetExcludedRoles\ContractExclusionSetExcludedRoleService;
use Anteris\Autotask\API\ContractExclusionSetExcludedRoles\ContractExclusionSetExcludedRoleQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ContractExclusionSetExcludedRoleService.
 */
class ContractExclusionSetExcludedRoleServiceTest extends AbstractTest
{
    /**
     * @covers ContractExclusionSetExcludedRoleService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractExclusionSetExcludedRoleService::class,
            $this->client->contractExclusionSetExcludedRoles()
        );
    }

    /**
     * @covers ContractExclusionSetExcludedRoleService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->contractExclusionSetExcludedRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ContractExclusionSetExcludedRoleCollection::class,
            $result
        );
    }

    /**
     * @covers ContractExclusionSetExcludedRoleCollection
     */
    public function test_collection_contains_contract_exclusion_set_excluded_role_entities()
    {
        $result = $this->client->contractExclusionSetExcludedRoles()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ContractExclusionSetExcludedRoleEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ContractExclusionSetExcludedRoleService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ContractExclusionSetExcludedRoleQueryBuilder::class,
            $this->client->contractExclusionSetExcludedRoles()->query()
        );
    }
}
