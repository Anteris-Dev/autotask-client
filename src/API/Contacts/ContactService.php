<?php

namespace Anteris\Autotask\API\Contacts;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use Anteris\Autotask\Support\EntityUserDefinedFields\EntityUserDefinedFieldCollection;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Contacts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactsEntity.htm Autotask documentation.
 */
class ContactService
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
     * Creates a new contact.
     *
     * @param  ContactEntity  $resource  The contact entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactEntity $resource): Response
    {
        $companyID = $resource->companyID;
        return $this->client->post("Companies/$companyID/Contacts", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $companyID  ID of the Contact parent resource.
     * @param  int  $id  ID of the Contact to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $companyID,int $id): void
    {
        $this->client->delete("Companies/$companyID/Contacts/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("Contacts/entityInformation/fields")
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
            $this->client->get("Contacts/entityInformation")
        );
    }

    /**
     * Returns information about what user defined fields an entity has.
     *
     * @see EntityUserDefinedFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityUserDefinedFields(): EntityUserDefinedFieldCollection
    {
        return EntityUserDefinedFieldCollection::fromResponse(
            $this->client->get("Contacts/entityInformation/userDefinedFields")
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
    public function update(ContactEntity $resource): Response
    {
        $companyID = $resource->companyID;
        return $this->client->put("Companies/$companyID/Contacts", $resource->toArray());
    }
}
