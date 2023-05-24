<?php

namespace Anteris\Autotask\API\ContactWebhookExcludedResources;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContactWebhookExcludedResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactWebhookExcludedResourcesEntity.htm Autotask documentation.
 */
class ContactWebhookExcludedResourceService
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
     * Creates a new contactwebhookexcludedresource.
     *
     * @param  ContactWebhookExcludedResourceEntity  $resource  The contactwebhookexcludedresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactWebhookExcludedResourceEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->post("ContactWebhooks/$resourceID/ExcludedResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $resourceID  ID of the ContactWebhookExcludedResource parent resource.
     * @param  int  $id  ID of the ContactWebhookExcludedResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $resourceID,int $id): void
    {
        $this->client->delete("ContactWebhooks/$resourceID/ExcludedResources/$id");
    }

    /**
     * Finds the ContactWebhookExcludedResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContactWebhookExcludedResourceEntity
    {
        return ContactWebhookExcludedResourceEntity::fromResponse(
            $this->client->get("ContactWebhookExcludedResources/$id")
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
            $this->client->get("ContactWebhookExcludedResources/entityInformation/fields")
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
            $this->client->get("ContactWebhookExcludedResources/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContactWebhookExcludedResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContactWebhookExcludedResourceQueryBuilder
    {
        return new ContactWebhookExcludedResourceQueryBuilder($this->client);
    }
}
