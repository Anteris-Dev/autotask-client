<?php

namespace Anteris\Autotask\API\ContractTicketPurchases;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractTicketPurchases.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractTicketPurchasesEntity.htm Autotask documentation.
 */
class ContractTicketPurchaseService
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
     * Creates a new contractticketpurchase.
     *
     * @param  ContractTicketPurchaseEntity  $resource  The contractticketpurchase entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractTicketPurchaseEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->post("Contracts/$contractID/TicketPurchases", $resource->toArray());
    }

    /**
     * Finds the ContractTicketPurchase based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractTicketPurchaseEntity
    {
        return ContractTicketPurchaseEntity::fromResponse(
            $this->client->get("ContractTicketPurchases/$id")
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
            $this->client->get("ContractTicketPurchases/entityInformation/fields")
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
            $this->client->get("ContractTicketPurchases/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractTicketPurchaseQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractTicketPurchaseQueryBuilder
    {
        return new ContractTicketPurchaseQueryBuilder($this->client);
    }

    /**
     * Updates the contractticketpurchase.
     *
     * @param  ContractTicketPurchaseEntity  $resource  The contractticketpurchase entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractTicketPurchaseEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->put("Contracts/$contractID/TicketPurchases", $resource->toArray());
    }
}
