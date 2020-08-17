<?php

namespace Anteris\Autotask\API\PurchaseApprovals;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PurchaseApprovals.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PurchaseApprovalsEntity.htm Autotask documentation.
 */
class PurchaseApprovalService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the PurchaseApproval based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PurchaseApprovalEntity
    {
        return PurchaseApprovalEntity::fromResponse(
            $this->client->get("PurchaseApprovals/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PurchaseApprovalQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PurchaseApprovalQueryBuilder
    {
        return new PurchaseApprovalQueryBuilder($this->client);
    }

    /**
     * Updates the purchaseapproval.
     *
     * @param  PurchaseApprovalEntity  $resource  The purchaseapproval entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PurchaseApprovalEntity $resource): void
    {
        $this->client->put("PurchaseApprovals/$resource->id", $resource->toArray());
    }
}
