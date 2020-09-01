<?php

use Anteris\Autotask\API\ResourceSkills\ResourceSkillCollection;
use Anteris\Autotask\API\ResourceSkills\ResourceSkillEntity;
use Anteris\Autotask\API\ResourceSkills\ResourceSkillService;
use Anteris\Autotask\API\ResourceSkills\ResourceSkillQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ResourceSkillService.
 */
class ResourceSkillServiceTest extends AbstractTest
{
    /**
     * @covers ResourceSkillService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ResourceSkillService::class,
            $this->client->resourceSkills()
        );
    }

    /**
     * @covers ResourceSkillService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->resourceSkills()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ResourceSkillCollection::class,
            $result
        );
    }

    /**
     * @covers ResourceSkillCollection
     */
    public function test_collection_contains_resource_skill_entities()
    {
        $result = $this->client->resourceSkills()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ResourceSkillEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ResourceSkillService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ResourceSkillQueryBuilder::class,
            $this->client->resourceSkills()->query()
        );
    }
}
