<?php

namespace Anteris\Autotask\API\SurveyResults;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask SurveyResults.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/SurveyResultsEntity.htm Autotask documentation.
 */
class SurveyResultService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the SurveyResult based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): SurveyResultEntity
    {
        return SurveyResultEntity::fromResponse(
            $this->client->get("SurveyResults/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see SurveyResultQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): SurveyResultQueryBuilder
    {
        return new SurveyResultQueryBuilder($this->client);
    }

}
