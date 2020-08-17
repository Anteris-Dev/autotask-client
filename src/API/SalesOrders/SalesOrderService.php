<?php

namespace Anteris\Autotask\API\SalesOrders;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask SalesOrders.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/SalesOrdersEntity.htm Autotask documentation.
 */
class SalesOrderService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the SalesOrder based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): SalesOrderEntity
    {
        return SalesOrderEntity::fromResponse(
            $this->client->get("SalesOrders/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see SalesOrderQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): SalesOrderQueryBuilder
    {
        return new SalesOrderQueryBuilder($this->client);
    }

    /**
     * Updates the salesorder.
     *
     * @param  SalesOrderEntity  $resource  The salesorder entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(SalesOrderEntity $resource): void
    {
        $this->client->put("SalesOrders/$resource->id", $resource->toArray());
    }
}
