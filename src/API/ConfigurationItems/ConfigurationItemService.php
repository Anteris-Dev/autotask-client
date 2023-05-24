<?php

namespace Anteris\Autotask\API\ConfigurationItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use Anteris\Autotask\Support\EntityUserDefinedFields\EntityUserDefinedFieldCollection;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemsEntity.htm Autotask documentation.
 */
class ConfigurationItemService
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
     * Creates a new configurationitem.
     *
     * @param  ConfigurationItemEntity  $resource  The configurationitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemEntity $resource): Response
    {
        return $this->client->post("ConfigurationItems", $resource->toArray());
    }

    /**
     * Finds the ConfigurationItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemEntity
    {
        return ConfigurationItemEntity::fromResponse(
            $this->client->get("ConfigurationItems/$id")
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
            $this->client->get("ConfigurationItems/entityInformation/fields")
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
            $this->client->get("ConfigurationItems/entityInformation")
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
            $this->client->get("ConfigurationItems/entityInformation/userDefinedFields")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemQueryBuilder
    {
        return new ConfigurationItemQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitem.
     *
     * @param  ConfigurationItemEntity  $resource  The configurationitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemEntity $resource): Response
    {
        return $this->client->put("ConfigurationItems", $resource->toArray());
    }
}
