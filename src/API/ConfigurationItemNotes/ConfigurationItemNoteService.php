<?php

namespace Anteris\Autotask\API\ConfigurationItemNotes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ConfigurationItemNotes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemNotesEntity.htm Autotask documentation.
 */
class ConfigurationItemNoteService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(ConfigurationItemNoteEntity $resource)
    {
        $this->client->post("ConfigurationItemNotes", $resource->toArray());
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
    public function update(ConfigurationItemNoteEntity $resource): void
    {
        $this->client->put("ConfigurationItemNotes/$resource->id", $resource->toArray());
    }
}
