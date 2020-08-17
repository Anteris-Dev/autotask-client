<?php

namespace Anteris\Autotask\API\CompanyTeams;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyTeams.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyTeamsEntity.htm Autotask documentation.
 */
class CompanyTeamService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new companyteam.
     *
     * @param  CompanyTeamEntity  $resource  The companyteam entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyTeamEntity $resource)
    {
        $this->client->post("CompanyTeams", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyTeam to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyTeams/$id");
    }

    /**
     * Finds the CompanyTeam based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyTeamEntity
    {
        return CompanyTeamEntity::fromResponse(
            $this->client->get("CompanyTeams/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyTeamQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyTeamQueryBuilder
    {
        return new CompanyTeamQueryBuilder($this->client);
    }

}
