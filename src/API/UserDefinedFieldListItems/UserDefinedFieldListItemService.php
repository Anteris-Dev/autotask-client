<?php

namespace Anteris\Autotask\API\UserDefinedFieldListItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask UserDefinedFieldListItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/UserDefinedFieldListItemsEntity.htm Autotask documentation.
 */
class UserDefinedFieldListItemService
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
     * Creates a new userdefinedfieldlistitem.
     *
     * @param  UserDefinedFieldListItemEntity  $resource  The userdefinedfieldlistitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(UserDefinedFieldListItemEntity $resource): Response
    {
        $udfFieldID = $resource->udfFieldID;
        return $this->client->post("UserDefinedFields/$udfFieldID/ListItems", $resource->toArray());
    }

    /**
     * Finds the UserDefinedFieldListItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): UserDefinedFieldListItemEntity
    {
        return UserDefinedFieldListItemEntity::fromResponse(
            $this->client->get("UserDefinedFieldListItems/$id")
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
            $this->client->get("UserDefinedFieldListItems/entityInformation/fields")
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
            $this->client->get("UserDefinedFieldListItems/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see UserDefinedFieldListItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): UserDefinedFieldListItemQueryBuilder
    {
        return new UserDefinedFieldListItemQueryBuilder($this->client);
    }

    /**
     * Updates the userdefinedfieldlistitem.
     *
     * @param  UserDefinedFieldListItemEntity  $resource  The userdefinedfieldlistitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(UserDefinedFieldListItemEntity $resource): Response
    {
        $udfFieldID = $resource->udfFieldID;
        return $this->client->put("UserDefinedFields/$udfFieldID/ListItems", $resource->toArray());
    }
}
