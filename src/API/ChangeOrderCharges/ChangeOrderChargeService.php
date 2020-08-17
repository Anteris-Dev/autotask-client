<?php

namespace Anteris\Autotask\API\ChangeOrderCharges;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ChangeOrderCharges.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ChangeOrderChargesEntity.htm Autotask documentation.
 */
class ChangeOrderChargeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new changeordercharge.
     *
     * @param  ChangeOrderChargeEntity  $resource  The changeordercharge entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ChangeOrderChargeEntity $resource)
    {
        $this->client->post("ChangeOrderCharges", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ChangeOrderCharge to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ChangeOrderCharges/$id");
    }

    /**
     * Finds the ChangeOrderCharge based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ChangeOrderChargeEntity
    {
        return ChangeOrderChargeEntity::fromResponse(
            $this->client->get("ChangeOrderCharges/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ChangeOrderChargeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ChangeOrderChargeQueryBuilder
    {
        return new ChangeOrderChargeQueryBuilder($this->client);
    }

    /**
     * Updates the changeordercharge.
     *
     * @param  ChangeOrderChargeEntity  $resource  The changeordercharge entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ChangeOrderChargeEntity $resource): void
    {
        $this->client->put("ChangeOrderCharges/$resource->id", $resource->toArray());
    }
}
