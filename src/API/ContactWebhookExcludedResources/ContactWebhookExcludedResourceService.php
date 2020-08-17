<?php

namespace Anteris\Autotask\API\ContactWebhookExcludedResources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContactWebhookExcludedResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactWebhookExcludedResourcesEntity.htm Autotask documentation.
 */
class ContactWebhookExcludedResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(ContactWebhookExcludedResourceEntity $resource)
    {
        $this->client->post("ContactWebhookExcludedResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContactWebhookExcludedResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContactWebhookExcludedResources/$id");
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
