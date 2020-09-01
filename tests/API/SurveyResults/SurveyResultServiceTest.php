<?php

use Anteris\Autotask\API\SurveyResults\SurveyResultCollection;
use Anteris\Autotask\API\SurveyResults\SurveyResultEntity;
use Anteris\Autotask\API\SurveyResults\SurveyResultService;
use Anteris\Autotask\API\SurveyResults\SurveyResultQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for SurveyResultService.
 */
class SurveyResultServiceTest extends AbstractTest
{
    /**
     * @covers SurveyResultService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            SurveyResultService::class,
            $this->client->surveyResults()
        );
    }

    /**
     * @covers SurveyResultService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->surveyResults()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            SurveyResultCollection::class,
            $result
        );
    }

    /**
     * @covers SurveyResultCollection
     */
    public function test_collection_contains_survey_result_entities()
    {
        $result = $this->client->surveyResults()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                SurveyResultEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers SurveyResultService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            SurveyResultQueryBuilder::class,
            $this->client->surveyResults()->query()
        );
    }
}
