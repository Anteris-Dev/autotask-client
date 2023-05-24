<?php

namespace Anteris\Autotask\API\ConfigurationItemWebhookExcludedResources;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItemWebhookExcludedResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemWebhookExcludedResourcesEntity.htm Autotask documentation.
 */
class ConfigurationItemWebhookExcludedResourceService
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
     * Creates a new configurationitemwebhookexcludedresource.
     *
     * @param  ConfigurationItemWebhookExcludedResourceEntity  $resource  The configurationitemwebhookexcludedresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemWebhookExcludedResourceEntity $resource): Response
    {
        return $this->client->post("ConfigurationItemWebhookExcludedResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ConfigurationItemWebhookExcludedResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ConfigurationItemWebhookExcludedResources/$id");
    }

    /**
     * Finds the ConfigurationItemWebhookExcludedResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemWebhookExcludedResourceEntity
    {
        return ConfigurationItemWebhookExcludedResourceEntity::fromResponse(
            $this->client->get("ConfigurationItemWebhookExcludedResources/$id")
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
            $this->client->get("ConfigurationItemWebhookExcludedResources/entityInformation/fields")
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
            $this->client->get("ConfigurationItemWebhookExcludedResources/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemWebhookExcludedResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemWebhookExcludedResourceQueryBuilder
    {
        return new ConfigurationItemWebhookExcludedResourceQueryBuilder($this->client);
    }
}
