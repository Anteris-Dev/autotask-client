<?php

namespace Anteris\Autotask\API\CompanyWebhookExcludedResources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyWebhookExcludedResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyWebhookExcludedResourcesEntity.htm Autotask documentation.
 */
class CompanyWebhookExcludedResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new companywebhookexcludedresource.
     *
     * @param  CompanyWebhookExcludedResourceEntity  $resource  The companywebhookexcludedresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyWebhookExcludedResourceEntity $resource)
    {
        $this->client->post("CompanyWebhookExcludedResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyWebhookExcludedResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyWebhookExcludedResources/$id");
    }

    /**
     * Finds the CompanyWebhookExcludedResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyWebhookExcludedResourceEntity
    {
        return CompanyWebhookExcludedResourceEntity::fromResponse(
            $this->client->get("CompanyWebhookExcludedResources/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyWebhookExcludedResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyWebhookExcludedResourceQueryBuilder
    {
        return new CompanyWebhookExcludedResourceQueryBuilder($this->client);
    }

}
