<?php

use Anteris\Autotask\API\CompanyTeams\CompanyTeamCollection;
use Anteris\Autotask\API\CompanyTeams\CompanyTeamEntity;
use Anteris\Autotask\API\CompanyTeams\CompanyTeamService;
use Anteris\Autotask\API\CompanyTeams\CompanyTeamQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyTeamService.
 */
class CompanyTeamServiceTest extends AbstractTest
{
    /**
     * @covers CompanyTeamService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyTeamService::class,
            $this->client->companyTeams()
        );
    }

    /**
     * @covers CompanyTeamService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->companyTeams()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CompanyTeamCollection::class,
            $result
        );
    }

    /**
     * @covers CompanyTeamCollection
     */
    public function test_collection_contains_company_team_entities()
    {
        $result = $this->client->companyTeams()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CompanyTeamEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CompanyTeamService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CompanyTeamQueryBuilder::class,
            $this->client->companyTeams()->query()
        );
    }
}
