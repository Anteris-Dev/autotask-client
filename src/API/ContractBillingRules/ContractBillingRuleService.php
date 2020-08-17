<?php

namespace Anteris\Autotask\API\ContractBillingRules;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractBillingRules.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractBillingRulesEntity.htm Autotask documentation.
 */
class ContractBillingRuleService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractbillingrule.
     *
     * @param  ContractBillingRuleEntity  $resource  The contractbillingrule entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractBillingRuleEntity $resource)
    {
        $this->client->post("ContractBillingRules", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContractBillingRule to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContractBillingRules/$id");
    }

    /**
     * Finds the ContractBillingRule based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractBillingRuleEntity
    {
        return ContractBillingRuleEntity::fromResponse(
            $this->client->get("ContractBillingRules/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractBillingRuleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractBillingRuleQueryBuilder
    {
        return new ContractBillingRuleQueryBuilder($this->client);
    }

    /**
     * Updates the contractbillingrule.
     *
     * @param  ContractBillingRuleEntity  $resource  The contractbillingrule entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractBillingRuleEntity $resource): void
    {
        $this->client->put("ContractBillingRules/$resource->id", $resource->toArray());
    }
}
