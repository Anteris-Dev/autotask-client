<?php

namespace Anteris\Autotask\API\TicketNoteWebhooks;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketNoteWebhooks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketNoteWebhooksEntity.htm Autotask documentation.
 */
class TicketNoteWebhookService
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
     * Creates a new ticketnotewebhook.
     *
     * @param  TicketNoteWebhookEntity  $resource  The ticketnotewebhook entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketNoteWebhookEntity $resource): Response
    {
        return $this->client->post("TicketNoteWebhooks", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the TicketNoteWebhook to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("TicketNoteWebhooks/$id");
    }

    /**
     * Finds the TicketNoteWebhook based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketNoteWebhookEntity
    {
        return TicketNoteWebhookEntity::fromResponse(
            $this->client->get("TicketNoteWebhooks/$id")
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
            $this->client->get("TicketNoteWebhooks/entityInformation/fields")
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
            $this->client->get("TicketNoteWebhooks/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketNoteWebhookQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketNoteWebhookQueryBuilder
    {
        return new TicketNoteWebhookQueryBuilder($this->client);
    }

    /**
     * Updates the ticketnotewebhook.
     *
     * @param  TicketNoteWebhookEntity  $resource  The ticketnotewebhook entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketNoteWebhookEntity $resource): Response
    {
        return $this->client->put("TicketNoteWebhooks", $resource->toArray());
    }
}
