<?php

namespace Anteris\Autotask\API\BillingItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask BillingItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/BillingItemsEntity.htm Autotask documentation.
 */
class BillingItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the BillingItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): BillingItemEntity
    {
        return BillingItemEntity::fromResponse(
            $this->client->get("BillingItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see BillingItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): BillingItemQueryBuilder
    {
        return new BillingItemQueryBuilder($this->client);
    }

    /**
     * Updates the billingitem.
     *
     * @param  BillingItemEntity  $resource  The billingitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(BillingItemEntity $resource): void
    {
        $this->client->put("BillingItems/$resource->id", $resource->toArray());
    }
}
