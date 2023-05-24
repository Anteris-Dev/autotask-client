<?php

namespace Anteris\Autotask\API\CompanyAlerts;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanyAlerts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyAlertsEntity.htm Autotask documentation.
 */
class CompanyAlertService
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
     * Creates a new companyalert.
     *
     * @param  CompanyAlertEntity  $resource  The companyalert entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyAlertEntity $resource): Response
    {
        $companyID = $resource->companyID;
        return $this->client->post("Companies/$companyID/Alerts", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $companyID  ID of the CompanyAlert parent resource.
     * @param  int  $id  ID of the CompanyAlert to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $companyID,int $id): void
    {
        $this->client->delete("Companies/$companyID/Alerts/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("CompanyAlerts/entityInformation/fields")
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
            $this->client->get("CompanyAlerts/entityInformation")
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
    public function update(CompanyAlertEntity $resource): Response
    {
        $companyID = $resource->companyID;
        return $this->client->put("Companies/$companyID/Alerts", $resource->toArray());
    }
}
