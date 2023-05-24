<?php

namespace Anteris\Autotask\API\Subscriptions;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Subscriptions.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/SubscriptionsEntity.htm Autotask documentation.
 */
class SubscriptionService
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
     * Creates a new subscription.
     *
     * @param  SubscriptionEntity  $resource  The subscription entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(SubscriptionEntity $resource): Response
    {
        return $this->client->post("Subscriptions", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the Subscription to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("Subscriptions/$id");
    }

    /**
     * Finds the Subscription based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): SubscriptionEntity
    {
        return SubscriptionEntity::fromResponse(
            $this->client->get("Subscriptions/$id")
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
            $this->client->get("Subscriptions/entityInformation/fields")
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
            $this->client->get("Subscriptions/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see SubscriptionQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): SubscriptionQueryBuilder
    {
        return new SubscriptionQueryBuilder($this->client);
    }

    /**
     * Updates the subscription.
     *
     * @param  SubscriptionEntity  $resource  The subscription entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(SubscriptionEntity $resource): Response
    {
        return $this->client->put("Subscriptions", $resource->toArray());
    }
}
