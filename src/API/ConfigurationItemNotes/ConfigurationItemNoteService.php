<?php

namespace Anteris\Autotask\API\ConfigurationItemNotes;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItemNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemNotesEntity.htm Autotask documentation.
 */
class ConfigurationItemNoteService
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
     * Creates a new configurationitemnote.
     *
     * @param  ConfigurationItemNoteEntity  $resource  The configurationitemnote entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemNoteEntity $resource): Response
    {
        $configurationItemID = $resource->configurationItemID;
        return $this->client->post("ConfigurationItems/$configurationItemID/Notes", $resource->toArray());
    }

    /**
     * Finds the ConfigurationItemNote based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemNoteEntity
    {
        return ConfigurationItemNoteEntity::fromResponse(
            $this->client->get("ConfigurationItemNotes/$id")
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
            $this->client->get("ConfigurationItemNotes/entityInformation/fields")
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
            $this->client->get("ConfigurationItemNotes/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemNoteQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemNoteQueryBuilder
    {
        return new ConfigurationItemNoteQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitemnote.
     *
     * @param  ConfigurationItemNoteEntity  $resource  The configurationitemnote entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemNoteEntity $resource): Response
    {
        $configurationItemID = $resource->configurationItemID;
        return $this->client->put("ConfigurationItems/$configurationItemID/Notes", $resource->toArray());
    }
}
