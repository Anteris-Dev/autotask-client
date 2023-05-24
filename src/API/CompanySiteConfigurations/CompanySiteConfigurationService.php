<?php

namespace Anteris\Autotask\API\CompanySiteConfigurations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use Anteris\Autotask\Support\EntityUserDefinedFields\EntityUserDefinedFieldCollection;
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("CompanySiteConfigurations/entityInformation/fields")
        );
    }

    /**
     * Returns information about what actions can be made against an entity.
     *
     * @see EntityInformationEntity
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityInformation(): EntityInformationEntity
    {
        return EntityInformationEntity::fromResponse(
            $this->client->get("CompanySiteConfigurations/entityInformation")
        );
    }

    /**
     * Returns information about what user defined fields an entity has.
     *
     * @see EntityUserDefinedFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityUserDefinedFields(): EntityUserDefinedFieldCollection
    {
        return EntityUserDefinedFieldCollection::fromResponse(
            $this->client->get("CompanySiteConfigurations/entityInformation/userDefinedFields")
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
