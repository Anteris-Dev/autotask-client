<?php

namespace Anteris\Autotask\API\ConfigurationItemWebhookUdfFields;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItemWebhookUdfFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemWebhookUdfFieldsEntity.htm Autotask documentation.
 */
class ConfigurationItemWebhookUdfFieldService
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
     * Creates a new configurationitemwebhookudffield.
     *
     * @param  ConfigurationItemWebhookUdfFieldEntity  $resource  The configurationitemwebhookudffield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemWebhookUdfFieldEntity $resource): Response
    {
        return $this->client->post("ConfigurationItemWebhookUdfFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ConfigurationItemWebhookUdfField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ConfigurationItemWebhookUdfFields/$id");
    }

    /**
     * Finds the ConfigurationItemWebhookUdfField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemWebhookUdfFieldEntity
    {
        return ConfigurationItemWebhookUdfFieldEntity::fromResponse(
            $this->client->get("ConfigurationItemWebhookUdfFields/$id")
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
            $this->client->get("ConfigurationItemWebhookUdfFields/entityInformation/fields")
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
            $this->client->get("ConfigurationItemWebhookUdfFields/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemWebhookUdfFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemWebhookUdfFieldQueryBuilder
    {
        return new ConfigurationItemWebhookUdfFieldQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitemwebhookudffield.
     *
     * @param  ConfigurationItemWebhookUdfFieldEntity  $resource  The configurationitemwebhookudffield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemWebhookUdfFieldEntity $resource): Response
    {
        return $this->client->put("ConfigurationItemWebhookUdfFields", $resource->toArray());
    }
}
