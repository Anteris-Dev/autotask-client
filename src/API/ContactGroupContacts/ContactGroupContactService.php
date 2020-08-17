<?php

namespace Anteris\Autotask\API\ContactGroupContacts;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContactGroupContacts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactGroupContactsEntity.htm Autotask documentation.
 */
class ContactGroupContactService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contactgroupcontact.
     *
     * @param  ContactGroupContactEntity  $resource  The contactgroupcontact entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactGroupContactEntity $resource)
    {
        $this->client->post("ContactGroupContacts", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContactGroupContact to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContactGroupContacts/$id");
    }

    /**
     * Finds the ContactGroupContact based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContactGroupContactEntity
    {
        return ContactGroupContactEntity::fromResponse(
            $this->client->get("ContactGroupContacts/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContactGroupContactQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContactGroupContactQueryBuilder
    {
        return new ContactGroupContactQueryBuilder($this->client);
    }

}
