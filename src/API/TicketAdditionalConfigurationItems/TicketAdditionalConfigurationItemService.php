<?php

namespace Anteris\Autotask\API\TicketAdditionalConfigurationItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketAdditionalConfigurationItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketAdditionalConfigurationItemsEntity.htm Autotask documentation.
 */
class TicketAdditionalConfigurationItemService
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
     * Creates a new ticketadditionalconfigurationitem.
     *
     * @param  TicketAdditionalConfigurationItemEntity  $resource  The ticketadditionalconfigurationitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketAdditionalConfigurationItemEntity $resource): Response
    {
        $ticketID = $resource->ticketID;
        return $this->client->post("Tickets/$ticketID/AdditionalConfigurationItems", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $ticketID  ID of the TicketAdditionalConfigurationItem parent resource.
     * @param  int  $id  ID of the TicketAdditionalConfigurationItem to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $ticketID,int $id): void
    {
        $this->client->delete("Tickets/$ticketID/AdditionalConfigurationItems/$id");
    }

    /**
     * Finds the TicketAdditionalConfigurationItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketAdditionalConfigurationItemEntity
    {
        return TicketAdditionalConfigurationItemEntity::fromResponse(
            $this->client->get("TicketAdditionalConfigurationItems/$id")
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
            $this->client->get("TicketAdditionalConfigurationItems/entityInformation/fields")
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
            $this->client->get("TicketAdditionalConfigurationItems/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketAdditionalConfigurationItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketAdditionalConfigurationItemQueryBuilder
    {
        return new TicketAdditionalConfigurationItemQueryBuilder($this->client);
    }
}
