<?php

namespace Anteris\Autotask\API\OrganizationalResources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask OrganizationalResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/OrganizationalResourcesEntity.htm Autotask documentation.
 */
class OrganizationalResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the OrganizationalResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): OrganizationalResourceEntity
    {
        return OrganizationalResourceEntity::fromResponse(
            $this->client->get("OrganizationalResources/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see OrganizationalResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): OrganizationalResourceQueryBuilder
    {
        return new OrganizationalResourceQueryBuilder($this->client);
    }

}
