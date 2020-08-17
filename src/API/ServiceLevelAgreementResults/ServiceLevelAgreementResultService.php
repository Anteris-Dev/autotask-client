<?php

namespace Anteris\Autotask\API\ServiceLevelAgreementResults;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ServiceLevelAgreementResults.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceLevelAgreementResultsEntity.htm Autotask documentation.
 */
class ServiceLevelAgreementResultService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the ServiceLevelAgreementResult based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceLevelAgreementResultEntity
    {
        return ServiceLevelAgreementResultEntity::fromResponse(
            $this->client->get("ServiceLevelAgreementResults/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceLevelAgreementResultQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceLevelAgreementResultQueryBuilder
    {
        return new ServiceLevelAgreementResultQueryBuilder($this->client);
    }

}
