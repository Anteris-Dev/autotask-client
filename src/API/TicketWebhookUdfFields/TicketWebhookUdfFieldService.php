<?php

namespace Anteris\Autotask\API\TicketWebhookUdfFields;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketWebhookUdfFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketWebhookUdfFieldsEntity.htm Autotask documentation.
 */
class TicketWebhookUdfFieldService
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
     * Creates a new ticketwebhookudffield.
     *
     * @param  TicketWebhookUdfFieldEntity  $resource  The ticketwebhookudffield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketWebhookUdfFieldEntity $resource): Response
    {
        return $this->client->post("TicketWebhookUdfFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketWebhookUdfField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketWebhookUdfFields/$id");
    }

    /**
     * Finds the TicketWebhookUdfField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketWebhookUdfFieldEntity
    {
        return TicketWebhookUdfFieldEntity::fromResponse(
            $this->client->get("TicketWebhookUdfFields/$id")
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
            $this->client->get("TicketWebhookUdfFields/entityInformation/fields")
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
            $this->client->get("TicketWebhookUdfFields/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketWebhookUdfFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketWebhookUdfFieldQueryBuilder
    {
        return new TicketWebhookUdfFieldQueryBuilder($this->client);
    }

    /**
     * Updates the ticketwebhookudffield.
     *
     * @param  TicketWebhookUdfFieldEntity  $resource  The ticketwebhookudffield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketWebhookUdfFieldEntity $resource): Response
    {
        return $this->client->put("TicketWebhookUdfFields", $resource->toArray());
    }
}
