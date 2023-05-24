<?php

namespace Anteris\Autotask\API\TimeOffRequests;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TimeOffRequests.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TimeOffRequestsEntity.htm Autotask documentation.
 */
class TimeOffRequestService
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
     * Creates a new timeoffrequest.
     *
     * @param  TimeOffRequestEntity  $resource  The timeoffrequest entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TimeOffRequestEntity $resource): Response
    {
        return $this->client->post("TimeOffRequests", $resource->toArray());
    }

    /**
     * Finds the TimeOffRequest based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TimeOffRequestEntity
    {
        return TimeOffRequestEntity::fromResponse(
            $this->client->get("TimeOffRequests/$id")
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
            $this->client->get("TimeOffRequests/entityInformation/fields")
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
            $this->client->get("TimeOffRequests/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TimeOffRequestQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TimeOffRequestQueryBuilder
    {
        return new TimeOffRequestQueryBuilder($this->client);
    }

    /**
     * Updates the timeoffrequest.
     *
     * @param  TimeOffRequestEntity  $resource  The timeoffrequest entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TimeOffRequestEntity $resource): Response
    {
        return $this->client->put("TimeOffRequests", $resource->toArray());
    }
}
