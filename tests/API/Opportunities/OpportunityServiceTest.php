<?php

use Anteris\Autotask\API\Opportunities\OpportunityCollection;
use Anteris\Autotask\API\Opportunities\OpportunityEntity;
use Anteris\Autotask\API\Opportunities\OpportunityService;
use Anteris\Autotask\API\Opportunities\OpportunityQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for OpportunityService.
 */
class OpportunityServiceTest extends AbstractTest
{
    /**
     * @covers OpportunityService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            OpportunityService::class,
            $this->client->opportunities()
        );
    }

    /**
     * @covers OpportunityService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->opportunities()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            OpportunityCollection::class,
            $result
        );
    }

    /**
     * @covers OpportunityCollection
     */
    public function test_collection_contains_opportunity_entities()
    {
        $result = $this->client->opportunities()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                OpportunityEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers OpportunityService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            OpportunityQueryBuilder::class,
            $this->client->opportunities()->query()
        );
    }
}
