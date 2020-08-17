<?php

namespace Anteris\Autotask\API\ServiceBundleServices;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ServiceBundleServices.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceBundleServicesEntity.htm Autotask documentation.
 */
class ServiceBundleServiceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new servicebundleservice.
     *
     * @param  ServiceBundleServiceEntity  $resource  The servicebundleservice entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceBundleServiceEntity $resource)
    {
        $this->client->post("ServiceBundleServices", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ServiceBundleService to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ServiceBundleServices/$id");
    }

    /**
     * Finds the ServiceBundleService based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceBundleServiceEntity
    {
        return ServiceBundleServiceEntity::fromResponse(
            $this->client->get("ServiceBundleServices/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceBundleServiceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceBundleServiceQueryBuilder
    {
        return new ServiceBundleServiceQueryBuilder($this->client);
    }

}
