<?php

namespace Anteris\Autotask\API\SubscriptionPeriods;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask SubscriptionPeriods.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/SubscriptionPeriodsEntity.htm Autotask documentation.
 */
class SubscriptionPeriodService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the SubscriptionPeriod based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): SubscriptionPeriodEntity
    {
        return SubscriptionPeriodEntity::fromResponse(
            $this->client->get("SubscriptionPeriods/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see SubscriptionPeriodQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): SubscriptionPeriodQueryBuilder
    {
        return new SubscriptionPeriodQueryBuilder($this->client);
    }

}
