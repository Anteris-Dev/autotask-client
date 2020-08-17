<?php

namespace Anteris\Autotask\API\Contacts;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Contacts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactsEntity.htm Autotask documentation.
 */
class ContactService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contact.
     *
     * @param  ContactEntity  $resource  The contact entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactEntity $resource)
    {
        $this->client->post("Contacts", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the Contact to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("Contacts/$id");
    }

    /**
     * Finds the Contact based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContactEntity
    {
        return ContactEntity::fromResponse(
            $this->client->get("Contacts/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContactQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContactQueryBuilder
    {
        return new ContactQueryBuilder($this->client);
    }

    /**
     * Updates the contact.
     *
     * @param  ContactEntity  $resource  The contact entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContactEntity $resource): void
    {
        $this->client->put("Contacts/$resource->id", $resource->toArray());
    }
}
