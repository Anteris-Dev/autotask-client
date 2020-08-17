<?php

namespace Anteris\Autotask\API\PaymentTerms;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PaymentTerms.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PaymentTermsEntity.htm Autotask documentation.
 */
class PaymentTermService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new paymentterm.
     *
     * @param  PaymentTermEntity  $resource  The paymentterm entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(PaymentTermEntity $resource)
    {
        $this->client->post("PaymentTerms", $resource->toArray());
    }


    /**
     * Finds the PaymentTerm based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PaymentTermEntity
    {
        return PaymentTermEntity::fromResponse(
            $this->client->get("PaymentTerms/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PaymentTermQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PaymentTermQueryBuilder
    {
        return new PaymentTermQueryBuilder($this->client);
    }

    /**
     * Updates the paymentterm.
     *
     * @param  PaymentTermEntity  $resource  The paymentterm entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PaymentTermEntity $resource): void
    {
        $this->client->put("PaymentTerms/$resource->id", $resource->toArray());
    }
}
