<?php

namespace Anteris\Autotask\API\WorkTypeModifiers;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask WorkTypeModifiers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/WorkTypeModifiersEntity.htm Autotask documentation.
 */
class WorkTypeModifierService
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
     * Finds the WorkTypeModifier based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): WorkTypeModifierEntity
    {
        return WorkTypeModifierEntity::fromResponse(
            $this->client->get("WorkTypeModifiers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see WorkTypeModifierQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): WorkTypeModifierQueryBuilder
    {
        return new WorkTypeModifierQueryBuilder($this->client);
    }

    /**
     * Updates the worktypemodifier.
     *
     * @param  WorkTypeModifierEntity  $resource  The worktypemodifier entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(WorkTypeModifierEntity $resource): Response
    {
        return $this->client->put("WorkTypeModifiers", $resource->toArray());
    }
}
