<?php

namespace Anteris\Autotask\API\ContactWebhookFields;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContactWebhookFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactWebhookFieldsEntity.htm Autotask documentation.
 */
class ContactWebhookFieldService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contactwebhookfield.
     *
     * @param  ContactWebhookFieldEntity  $resource  The contactwebhookfield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactWebhookFieldEntity $resource)
    {
        $this->client->post("ContactWebhookFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContactWebhookField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContactWebhookFields/$id");
    }

    /**
     * Finds the ContactWebhookField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContactWebhookFieldEntity
    {
        return ContactWebhookFieldEntity::fromResponse(
            $this->client->get("ContactWebhookFields/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContactWebhookFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContactWebhookFieldQueryBuilder
    {
        return new ContactWebhookFieldQueryBuilder($this->client);
    }

    /**
     * Updates the contactwebhookfield.
     *
     * @param  ContactWebhookFieldEntity  $resource  The contactwebhookfield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContactWebhookFieldEntity $resource): void
    {
        $this->client->put("ContactWebhookFields/$resource->id", $resource->toArray());
    }
}
