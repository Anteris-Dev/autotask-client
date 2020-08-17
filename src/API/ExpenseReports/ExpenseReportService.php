<?php

namespace Anteris\Autotask\API\ExpenseReports;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ExpenseReports.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ExpenseReportsEntity.htm Autotask documentation.
 */
class ExpenseReportService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new expensereport.
     *
     * @param  ExpenseReportEntity  $resource  The expensereport entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ExpenseReportEntity $resource)
    {
        $this->client->post("ExpenseReports", $resource->toArray());
    }


    /**
     * Finds the ExpenseReport based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ExpenseReportEntity
    {
        return ExpenseReportEntity::fromResponse(
            $this->client->get("ExpenseReports/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ExpenseReportQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ExpenseReportQueryBuilder
    {
        return new ExpenseReportQueryBuilder($this->client);
    }

    /**
     * Updates the expensereport.
     *
     * @param  ExpenseReportEntity  $resource  The expensereport entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ExpenseReportEntity $resource): void
    {
        $this->client->put("ExpenseReports/$resource->id", $resource->toArray());
    }
}
