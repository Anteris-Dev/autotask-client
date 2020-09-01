<?php

use Anteris\Autotask\API\Phases\PhaseCollection;
use Anteris\Autotask\API\Phases\PhaseEntity;
use Anteris\Autotask\API\Phases\PhaseService;
use Anteris\Autotask\API\Phases\PhaseQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PhaseService.
 */
class PhaseServiceTest extends AbstractTest
{
    /**
     * @covers PhaseService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PhaseService::class,
            $this->client->phases()
        );
    }

    /**
     * @covers PhaseService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->phases()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PhaseCollection::class,
            $result
        );
    }

    /**
     * @covers PhaseCollection
     */
    public function test_collection_contains_phase_entities()
    {
        $result = $this->client->phases()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PhaseEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PhaseService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PhaseQueryBuilder::class,
            $this->client->phases()->query()
        );
    }
}
