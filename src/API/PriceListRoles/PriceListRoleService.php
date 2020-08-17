<?php

namespace Anteris\Autotask\API\PriceListRoles;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PriceListRoles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListRolesEntity.htm Autotask documentation.
 */
class PriceListRoleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the PriceListRole based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PriceListRoleEntity
    {
        return PriceListRoleEntity::fromResponse(
            $this->client->get("PriceListRoles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PriceListRoleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PriceListRoleQueryBuilder
    {
        return new PriceListRoleQueryBuilder($this->client);
    }

    /**
     * Updates the pricelistrole.
     *
     * @param  PriceListRoleEntity  $resource  The pricelistrole entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PriceListRoleEntity $resource): void
    {
        $this->client->put("PriceListRoles/$resource->id", $resource->toArray());
    }
}
