<?php

namespace Anteris\Autotask\API\CompanyAlerts;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyAlerts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyAlertsEntity.htm Autotask documentation.
 */
class CompanyAlertService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new companyalert.
     *
     * @param  CompanyAlertEntity  $resource  The companyalert entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyAlertEntity $resource)
    {
        $this->client->post("CompanyAlerts", $resource->toArray());
    }


    /**
     * Finds the CompanyAlert based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyAlertEntity
    {
        return CompanyAlertEntity::fromResponse(
            $this->client->get("CompanyAlerts/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyAlertQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyAlertQueryBuilder
    {
        return new CompanyAlertQueryBuilder($this->client);
    }

    /**
     * Updates the companyalert.
     *
     * @param  CompanyAlertEntity  $resource  The companyalert entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyAlertEntity $resource): void
    {
        $this->client->put("CompanyAlerts/$resource->id", $resource->toArray());
    }
}
