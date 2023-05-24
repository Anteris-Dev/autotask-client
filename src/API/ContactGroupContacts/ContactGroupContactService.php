<?php

namespace Anteris\Autotask\API\ContactGroupContacts;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContactGroupContacts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactGroupContactsEntity.htm Autotask documentation.
 */
class ContactGroupContactService
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
     * Creates a new contactgroupcontact.
     *
     * @param  ContactGroupContactEntity  $resource  The contactgroupcontact entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactGroupContactEntity $resource): Response
    {
        $contactGroupID = $resource->contactGroupID;
        return $this->client->post("ContactGroups/$contactGroupID/Contacts", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $contactGroupID  ID of the ContactGroupContact parent resource.
     * @param  int  $id  ID of the ContactGroupContact to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $contactGroupID,int $id): void
    {
        $this->client->delete("ContactGroups/$contactGroupID/Contacts/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ContactGroupContacts/entityInformation/fields")
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
            $this->client->get("ContactGroupContacts/entityInformation")
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
