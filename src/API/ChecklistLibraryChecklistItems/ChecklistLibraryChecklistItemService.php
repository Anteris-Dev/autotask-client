<?php

namespace Anteris\Autotask\API\ChecklistLibraryChecklistItems;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ChecklistLibraryChecklistItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ChecklistLibraryChecklistItemsEntity.htm Autotask documentation.
 */
class ChecklistLibraryChecklistItemService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new checklistlibrarychecklistitem.
     *
     * @param  ChecklistLibraryChecklistItemEntity  $resource  The checklistlibrarychecklistitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ChecklistLibraryChecklistItemEntity $resource)
    {
        $this->client->post("ChecklistLibraryChecklistItems", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ChecklistLibraryChecklistItem to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ChecklistLibraryChecklistItems/$id");
    }

    /**
     * Finds the ChecklistLibraryChecklistItem based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ChecklistLibraryChecklistItemEntity
    {
        return ChecklistLibraryChecklistItemEntity::fromResponse(
            $this->client->get("ChecklistLibraryChecklistItems/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ChecklistLibraryChecklistItemQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ChecklistLibraryChecklistItemQueryBuilder
    {
        return new ChecklistLibraryChecklistItemQueryBuilder($this->client);
    }

    /**
     * Updates the checklistlibrarychecklistitem.
     *
     * @param  ChecklistLibraryChecklistItemEntity  $resource  The checklistlibrarychecklistitem entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ChecklistLibraryChecklistItemEntity $resource): void
    {
        $this->client->put("ChecklistLibraryChecklistItems/$resource->id", $resource->toArray());
    }
}
