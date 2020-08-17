<?php

namespace Anteris\Autotask\API\ContactBillingProductAssociations;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContactBillingProductAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactBillingProductAssociationsEntity.htm Autotask documentation.
 */
class ContactBillingProductAssociationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(ContactBillingProductAssociationEntity $resource)
    {
        $this->client->post("ContactBillingProductAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContactBillingProductAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContactBillingProductAssociations/$id");
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
    public function update(ContactBillingProductAssociationEntity $resource): void
    {
        $this->client->put("ContactBillingProductAssociations/$resource->id", $resource->toArray());
    }
}
