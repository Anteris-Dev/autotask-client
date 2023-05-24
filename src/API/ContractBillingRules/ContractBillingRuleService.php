<?php

namespace Anteris\Autotask\API\ContractBillingRules;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractBillingRules.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractBillingRulesEntity.htm Autotask documentation.
 */
class ContractBillingRuleService
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
     * Creates a new contractbillingrule.
     *
     * @param  ContractBillingRuleEntity  $resource  The contractbillingrule entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractBillingRuleEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->post("Contracts/$contractID/BillingRules", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $contractID  ID of the ContractBillingRule parent resource.
     * @param  int  $id  ID of the ContractBillingRule to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $contractID,int $id): void
    {
        $this->client->delete("Contracts/$contractID/BillingRules/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ContractBillingRules/entityInformation/fields")
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
            $this->client->get("ContractBillingRules/entityInformation")
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
    public function update(ContractBillingRuleEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->put("Contracts/$contractID/BillingRules", $resource->toArray());
    }
}
