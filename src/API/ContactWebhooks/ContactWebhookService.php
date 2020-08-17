<?php

namespace Anteris\Autotask\API\ContactWebhooks;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContactWebhooks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactWebhooksEntity.htm Autotask documentation.
 */
class ContactWebhookService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contactwebhook.
     *
     * @param  ContactWebhookEntity  $resource  The contactwebhook entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactWebhookEntity $resource)
    {
        $this->client->post("ContactWebhooks", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContactWebhook to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContactWebhooks/$id");
    }

    /**
     * Finds the ContactWebhook based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContactWebhookEntity
    {
        return ContactWebhookEntity::fromResponse(
            $this->client->get("ContactWebhooks/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContactWebhookQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContactWebhookQueryBuilder
    {
        return new ContactWebhookQueryBuilder($this->client);
    }

    /**
     * Updates the contactwebhook.
     *
     * @param  ContactWebhookEntity  $resource  The contactwebhook entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContactWebhookEntity $resource): void
    {
        $this->client->put("ContactWebhooks/$resource->id", $resource->toArray());
    }
}
