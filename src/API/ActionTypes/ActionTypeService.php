<?php

namespace Anteris\Autotask\API\ActionTypes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ActionTypes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ActionTypesEntity.htm Autotask documentation.
 */
class ActionTypeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new actiontype.
     *
     * @param  ActionTypeEntity  $resource  The actiontype entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ActionTypeEntity $resource)
    {
        $this->client->post("ActionTypes", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ActionType to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ActionTypes/$id");
    }

    /**
     * Finds the ActionType based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ActionTypeEntity
    {
        return ActionTypeEntity::fromResponse(
            $this->client->get("ActionTypes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ActionTypeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ActionTypeQueryBuilder
    {
        return new ActionTypeQueryBuilder($this->client);
    }

    /**
     * Updates the actiontype.
     *
     * @param  ActionTypeEntity  $resource  The actiontype entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ActionTypeEntity $resource): void
    {
        $this->client->put("ActionTypes/$resource->id", $resource->toArray());
    }
}