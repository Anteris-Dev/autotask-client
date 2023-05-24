<?php

namespace Anteris\Autotask\API\ContactWebhookFields;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContactWebhookFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContactWebhookFieldsEntity.htm Autotask documentation.
 */
class ContactWebhookFieldService
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
     * Creates a new contactwebhookfield.
     *
     * @param  ContactWebhookFieldEntity  $resource  The contactwebhookfield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContactWebhookFieldEntity $resource): Response
    {
        $webhookID = $resource->webhookID;
        return $this->client->post("ContactWebhooks/$webhookID/Fields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $webhookID  ID of the ContactWebhookField parent resource.
     * @param  int  $id  ID of the ContactWebhookField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $webhookID,int $id): void
    {
        $this->client->delete("ContactWebhooks/$webhookID/Fields/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ContactWebhookFields/entityInformation/fields")
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
            $this->client->get("ContactWebhookFields/entityInformation")
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
    public function update(ContactWebhookFieldEntity $resource): Response
    {
        $webhookID = $resource->webhookID;
        return $this->client->put("ContactWebhooks/$webhookID/Fields", $resource->toArray());
    }
}
