<?php

namespace Anteris\Autotask\API\ContractExclusionBillingCodes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractExclusionBillingCodes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractExclusionBillingCodesEntity.htm Autotask documentation.
 */
class ContractExclusionBillingCodeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractexclusionbillingcode.
     *
     * @param  ContractExclusionBillingCodeEntity  $resource  The contractexclusionbillingcode entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractExclusionBillingCodeEntity $resource)
    {
        $this->client->post("ContractExclusionBillingCodes", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContractExclusionBillingCode to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContractExclusionBillingCodes/$id");
    }

    /**
     * Finds the ContractExclusionBillingCode based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractExclusionBillingCodeEntity
    {
        return ContractExclusionBillingCodeEntity::fromResponse(
            $this->client->get("ContractExclusionBillingCodes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractExclusionBillingCodeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractExclusionBillingCodeQueryBuilder
    {
        return new ContractExclusionBillingCodeQueryBuilder($this->client);
    }

}
