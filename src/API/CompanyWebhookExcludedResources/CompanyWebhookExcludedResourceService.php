<?php

namespace Anteris\Autotask\API\CompanyWebhookExcludedResources;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanyWebhookExcludedResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyWebhookExcludedResourcesEntity.htm Autotask documentation.
 */
class CompanyWebhookExcludedResourceService
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
     * Creates a new companywebhookexcludedresource.
     *
     * @param  CompanyWebhookExcludedResourceEntity  $resource  The companywebhookexcludedresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyWebhookExcludedResourceEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->post("CompanyWebhooks/$resourceID/ExcludedResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $resourceID  ID of the CompanyWebhookExcludedResource parent resource.
     * @param  int  $id  ID of the CompanyWebhookExcludedResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $resourceID,int $id): void
    {
        $this->client->delete("CompanyWebhooks/$resourceID/ExcludedResources/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("CompanyWebhookExcludedResources/entityInformation/fields")
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
            $this->client->get("CompanyWebhookExcludedResources/entityInformation")
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
