<?php

namespace Anteris\Autotask\API\ConfigurationItemCategoryUdfAssociations;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItemCategoryUdfAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemCategoryUdfAssociationsEntity.htm Autotask documentation.
 */
class ConfigurationItemCategoryUdfAssociationService
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
     * Creates a new configurationitemcategoryudfassociation.
     *
     * @param  ConfigurationItemCategoryUdfAssociationEntity  $resource  The configurationitemcategoryudfassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemCategoryUdfAssociationEntity $resource): Response
    {
        $configurationItemCategoryID = $resource->configurationItemCategoryID;
        return $this->client->post("ConfigurationItemCategories/$configurationItemCategoryID/UdfAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $configurationItemCategoryID  ID of the ConfigurationItemCategoryUdfAssociation parent resource.
     * @param  int  $id  ID of the ConfigurationItemCategoryUdfAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $configurationItemCategoryID,int $id): void
    {
        $this->client->delete("ConfigurationItemCategories/$configurationItemCategoryID/UdfAssociations/$id");
    }

    /**
     * Finds the ConfigurationItemCategoryUdfAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemCategoryUdfAssociationEntity
    {
        return ConfigurationItemCategoryUdfAssociationEntity::fromResponse(
            $this->client->get("ConfigurationItemCategoryUdfAssociations/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemCategoryUdfAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemCategoryUdfAssociationQueryBuilder
    {
        return new ConfigurationItemCategoryUdfAssociationQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitemcategoryudfassociation.
     *
     * @param  ConfigurationItemCategoryUdfAssociationEntity  $resource  The configurationitemcategoryudfassociation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemCategoryUdfAssociationEntity $resource): Response
    {
        $configurationItemCategoryID = $resource->configurationItemCategoryID;
        return $this->client->put("ConfigurationItemCategories/$configurationItemCategoryID/UdfAssociations", $resource->toArray());
    }
}
