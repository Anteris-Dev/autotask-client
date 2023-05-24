<?php

namespace Anteris\Autotask\API\UserDefinedFieldDefinitions;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask UserDefinedFieldDefinitions.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/UserDefinedFieldDefinitionsEntity.htm Autotask documentation.
 */
class UserDefinedFieldDefinitionService
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
     * Creates a new userdefinedfielddefinition.
     *
     * @param  UserDefinedFieldDefinitionEntity  $resource  The userdefinedfielddefinition entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(UserDefinedFieldDefinitionEntity $resource): Response
    {
        return $this->client->post("UserDefinedFieldDefinitions", $resource->toArray());
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("UserDefinedFieldDefinitions/entityInformation/fields")
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
            $this->client->get("UserDefinedFieldDefinitions/entityInformation")
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
    public function update(UserDefinedFieldDefinitionEntity $resource): Response
    {
        return $this->client->put("UserDefinedFieldDefinitions", $resource->toArray());
    }
}
