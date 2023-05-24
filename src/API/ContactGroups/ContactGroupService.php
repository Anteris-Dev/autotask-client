<?php

namespace Anteris\Autotask\API\ContactGroups;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContactGroups.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactGroupsEntity.htm Autotask documentation.
 */
class ContactGroupService
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
     * Creates a new contactgroup.
     *
     * @param  ContactGroupEntity  $resource  The contactgroup entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactGroupEntity $resource): Response
    {
        return $this->client->post("ContactGroups", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContactGroup to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContactGroups/$id");
    }

    /**
     * Finds the ContactGroup based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContactGroupEntity
    {
        return ContactGroupEntity::fromResponse(
            $this->client->get("ContactGroups/$id")
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
            $this->client->get("ContactGroups/entityInformation/fields")
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
            $this->client->get("ContactGroups/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContactGroupQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContactGroupQueryBuilder
    {
        return new ContactGroupQueryBuilder($this->client);
    }

    /**
     * Updates the contactgroup.
     *
     * @param  ContactGroupEntity  $resource  The contactgroup entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContactGroupEntity $resource): Response
    {
        return $this->client->put("ContactGroups", $resource->toArray());
    }
}
