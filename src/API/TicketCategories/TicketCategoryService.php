<?php

namespace Anteris\Autotask\API\TicketCategories;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketCategories.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketCategoriesEntity.htm Autotask documentation.
 */
class TicketCategoryService
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
     * Finds the TicketCategory based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketCategoryEntity
    {
        return TicketCategoryEntity::fromResponse(
            $this->client->get("TicketCategories/$id")
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
            $this->client->get("TicketCategories/entityInformation/fields")
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
            $this->client->get("TicketCategories/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketCategoryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketCategoryQueryBuilder
    {
        return new TicketCategoryQueryBuilder($this->client);
    }

    /**
     * Updates the ticketcategory.
     *
     * @param  TicketCategoryEntity  $resource  The ticketcategory entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TicketCategoryEntity $resource): Response
    {
        return $this->client->put("TicketCategories", $resource->toArray());
    }
}
