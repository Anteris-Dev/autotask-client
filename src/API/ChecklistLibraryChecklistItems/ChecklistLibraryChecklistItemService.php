<?php

namespace Anteris\Autotask\API\ChecklistLibraryChecklistItems;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ChecklistLibraryChecklistItems.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ChecklistLibraryChecklistItemsEntity.htm Autotask documentation.
 */
class ChecklistLibraryChecklistItemService
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
     * Creates a new checklistlibrarychecklistitem.
     *
     * @param  ChecklistLibraryChecklistItemEntity  $resource  The checklistlibrarychecklistitem entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ChecklistLibraryChecklistItemEntity $resource): Response
    {
        $checklistLibraryID = $resource->checklistLibraryID;
        return $this->client->post("ChecklistLibraries/$checklistLibraryID/ChecklistItems", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $checklistLibraryID  ID of the ChecklistLibraryChecklistItem parent resource.
     * @param  int  $id  ID of the ChecklistLibraryChecklistItem to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $checklistLibraryID,int $id): void
    {
        $this->client->delete("ChecklistLibraries/$checklistLibraryID/ChecklistItems/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ChecklistLibraryChecklistItems/entityInformation/fields")
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
            $this->client->get("ChecklistLibraryChecklistItems/entityInformation")
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
    public function update(ChecklistLibraryChecklistItemEntity $resource): Response
    {
        $checklistLibraryID = $resource->checklistLibraryID;
        return $this->client->put("ChecklistLibraries/$checklistLibraryID/ChecklistItems", $resource->toArray());
    }
}
