<?php

namespace Anteris\Autotask\API\TicketNoteWebhookFields;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketNoteWebhookFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketNoteWebhookFieldsEntity.htm Autotask documentation.
 */
class TicketNoteWebhookFieldService
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
     * Creates a new ticketnotewebhookfield.
     *
     * @param  TicketNoteWebhookFieldEntity  $resource  The ticketnotewebhookfield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketNoteWebhookFieldEntity $resource): Response
    {
        return $this->client->post("TicketNoteWebhookFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketNoteWebhookField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketNoteWebhookFields/$id");
    }

    /**
     * Finds the TicketNoteWebhookField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketNoteWebhookFieldEntity
    {
        return TicketNoteWebhookFieldEntity::fromResponse(
            $this->client->get("TicketNoteWebhookFields/$id")
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
            $this->client->get("TicketNoteWebhookFields/entityInformation/fields")
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
            $this->client->get("TicketNoteWebhookFields/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketNoteWebhookFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketNoteWebhookFieldQueryBuilder
    {
        return new TicketNoteWebhookFieldQueryBuilder($this->client);
    }

    /**
     * Updates the ticketnotewebhookfield.
     *
     * @param  TicketNoteWebhookFieldEntity  $resource  The ticketnotewebhookfield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketNoteWebhookFieldEntity $resource): Response
    {
        return $this->client->put("TicketNoteWebhookFields", $resource->toArray());
    }
}
