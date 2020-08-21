<?php

namespace Anteris\Autotask\API\CompanySiteConfigurations;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanySiteConfigurations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanySiteConfigurationsEntity.htm Autotask documentation.
 */
class CompanySiteConfigurationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    /**
     * Instantiates the class.
     *
     * @param  HttpClient  $client  The http client that will be used to interact with the API.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Finds the CompanySiteConfiguration based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanySiteConfigurationEntity
    {
        return CompanySiteConfigurationEntity::fromResponse(
            $this->client->get("CompanySiteConfigurations/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanySiteConfigurationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanySiteConfigurationQueryBuilder
    {
        return new CompanySiteConfigurationQueryBuilder($this->client);
    }

    /**
     * Updates the companysiteconfiguration.
     *
     * @param  CompanySiteConfigurationEntity  $resource  The companysiteconfiguration entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanySiteConfigurationEntity $resource): Response
    {
        $companyID = $resource->companyID;
        return $this->client->put("Companies/$companyID/SiteConfigurations", $resource->toArray());
    }
}
