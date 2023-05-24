<?php

namespace Anteris\Autotask\API\ContactBillingProductAssociations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContactBillingProductAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactBillingProductAssociationsEntity.htm Autotask documentation.
 */
class ContactBillingProductAssociationService
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
     * Creates a new contactbillingproductassociation.
     *
     * @param  ContactBillingProductAssociationEntity  $resource  The contactbillingproductassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactBillingProductAssociationEntity $resource): Response
    {
        $contactID = $resource->contactID;
        return $this->client->post("Contacts/$contactID/BillingProductAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $contactID  ID of the ContactBillingProductAssociation parent resource.
     * @param  int  $id  ID of the ContactBillingProductAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $contactID,int $id): void
    {
        $this->client->delete("Contacts/$contactID/BillingProductAssociations/$id");
    }

    /**
     * Finds the ContactBillingProductAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContactBillingProductAssociationEntity
    {
        return ContactBillingProductAssociationEntity::fromResponse(
            $this->client->get("ContactBillingProductAssociations/$id")
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
            $this->client->get("ContactBillingProductAssociations/entityInformation/fields")
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
            $this->client->get("ContactBillingProductAssociations/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContactBillingProductAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContactBillingProductAssociationQueryBuilder
    {
        return new ContactBillingProductAssociationQueryBuilder($this->client);
    }

    /**
     * Updates the contactbillingproductassociation.
     *
     * @param  ContactBillingProductAssociationEntity  $resource  The contactbillingproductassociation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContactBillingProductAssociationEntity $resource): Response
    {
        $contactID = $resource->contactID;
        return $this->client->put("Contacts/$contactID/BillingProductAssociations", $resource->toArray());
    }
}
