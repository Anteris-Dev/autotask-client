<?php

namespace Anteris\Autotask\API\ConfigurationItemWebhookFields;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItemWebhookFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemWebhookFieldsEntity.htm Autotask documentation.
 */
class ConfigurationItemWebhookFieldService
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
     * Creates a new configurationitemwebhookfield.
     *
     * @param  ConfigurationItemWebhookFieldEntity  $resource  The configurationitemwebhookfield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemWebhookFieldEntity $resource): Response
    {
        return $this->client->post("ConfigurationItemWebhookFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ConfigurationItemWebhookField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ConfigurationItemWebhookFields/$id");
    }

    /**
     * Finds the ConfigurationItemWebhookField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemWebhookFieldEntity
    {
        return ConfigurationItemWebhookFieldEntity::fromResponse(
            $this->client->get("ConfigurationItemWebhookFields/$id")
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
            $this->client->get("ConfigurationItemWebhookFields/entityInformation/fields")
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
            $this->client->get("ConfigurationItemWebhookFields/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemWebhookFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemWebhookFieldQueryBuilder
    {
        return new ConfigurationItemWebhookFieldQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitemwebhookfield.
     *
     * @param  ConfigurationItemWebhookFieldEntity  $resource  The configurationitemwebhookfield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemWebhookFieldEntity $resource): Response
    {
        return $this->client->put("ConfigurationItemWebhookFields", $resource->toArray());
    }
}
