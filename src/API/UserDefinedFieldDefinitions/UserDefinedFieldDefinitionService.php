<?php

namespace Anteris\Autotask\API\UserDefinedFieldDefinitions;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask UserDefinedFieldDefinitions.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/UserDefinedFieldDefinitionsEntity.htm Autotask documentation.
 */
class UserDefinedFieldDefinitionService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new userdefinedfielddefinition.
     *
     * @param  UserDefinedFieldDefinitionEntity  $resource  The userdefinedfielddefinition entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(UserDefinedFieldDefinitionEntity $resource)
    {
        $this->client->post("UserDefinedFieldDefinitions", $resource->toArray());
    }


    /**
     * Finds the UserDefinedFieldDefinition based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): UserDefinedFieldDefinitionEntity
    {
        return UserDefinedFieldDefinitionEntity::fromResponse(
            $this->client->get("UserDefinedFieldDefinitions/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see UserDefinedFieldDefinitionQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): UserDefinedFieldDefinitionQueryBuilder
    {
        return new UserDefinedFieldDefinitionQueryBuilder($this->client);
    }

    /**
     * Updates the userdefinedfielddefinition.
     *
     * @param  UserDefinedFieldDefinitionEntity  $resource  The userdefinedfielddefinition entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(UserDefinedFieldDefinitionEntity $resource): void
    {
        $this->client->put("UserDefinedFieldDefinitions/$resource->id", $resource->toArray());
    }
}
