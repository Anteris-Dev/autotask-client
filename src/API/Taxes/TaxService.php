<?php

namespace Anteris\Autotask\API\Taxes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Taxes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TaxesEntity.htm Autotask documentation.
 */
class TaxService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new tax.
     *
     * @param  TaxEntity  $resource  The tax entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TaxEntity $resource)
    {
        $this->client->post("Taxes", $resource->toArray());
    }


    /**
     * Finds the Tax based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TaxEntity
    {
        return TaxEntity::fromResponse(
            $this->client->get("Taxes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TaxQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TaxQueryBuilder
    {
        return new TaxQueryBuilder($this->client);
    }

    /**
     * Updates the tax.
     *
     * @param  TaxEntity  $resource  The tax entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(TaxEntity $resource): void
    {
        $this->client->put("Taxes/$resource->id", $resource->toArray());
    }
}
