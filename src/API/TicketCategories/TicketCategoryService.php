<?php

namespace Anteris\Autotask\API\TicketCategories;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketCategories.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketCategoriesEntity.htm Autotask documentation.
 */
class TicketCategoryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function update(TicketCategoryEntity $resource): void
    {
        $this->client->put("TicketCategories/$resource->id", $resource->toArray());
    }
}
