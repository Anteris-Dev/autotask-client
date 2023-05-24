<?php

namespace Anteris\Autotask\API\TicketWebhookFields;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketWebhookFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketWebhookFieldsEntity.htm Autotask documentation.
 */
class TicketWebhookFieldService
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
     * Creates a new ticketwebhookfield.
     *
     * @param  TicketWebhookFieldEntity  $resource  The ticketwebhookfield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketWebhookFieldEntity $resource): Response
    {
        return $this->client->post("TicketWebhookFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketWebhookField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketWebhookFields/$id");
    }

    /**
     * Finds the TicketWebhookField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketWebhookFieldEntity
    {
        return TicketWebhookFieldEntity::fromResponse(
            $this->client->get("TicketWebhookFields/$id")
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
            $this->client->get("TicketWebhookFields/entityInformation/fields")
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
            $this->client->get("TicketWebhookFields/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketWebhookFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketWebhookFieldQueryBuilder
    {
        return new TicketWebhookFieldQueryBuilder($this->client);
    }

    /**
     * Updates the ticketwebhookfield.
     *
     * @param  TicketWebhookFieldEntity  $resource  The ticketwebhookfield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketWebhookFieldEntity $resource): Response
    {
        return $this->client->put("TicketWebhookFields", $resource->toArray());
    }
}
