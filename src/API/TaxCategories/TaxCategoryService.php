<?php

namespace Anteris\Autotask\API\TaxCategories;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TaxCategories.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaxCategoriesEntity.htm Autotask documentation.
 */
class TaxCategoryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new taxcategory.
     *
     * @param  TaxCategoryEntity  $resource  The taxcategory entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaxCategoryEntity $resource)
    {
        $this->client->post("TaxCategories", $resource->toArray());
    }


    /**
     * Finds the TaxCategory based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TaxCategoryEntity
    {
        return TaxCategoryEntity::fromResponse(
            $this->client->get("TaxCategories/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TaxCategoryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TaxCategoryQueryBuilder
    {
        return new TaxCategoryQueryBuilder($this->client);
    }

    /**
     * Updates the taxcategory.
     *
     * @param  TaxCategoryEntity  $resource  The taxcategory entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TaxCategoryEntity $resource): void
    {
        $this->client->put("TaxCategories/$resource->id", $resource->toArray());
    }
}
