<?php

namespace Anteris\Autotask\API\BillingCodes;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask BillingCodes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/BillingCodesEntity.htm Autotask documentation.
 */
class BillingCodeService
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
     * Finds the BillingCode based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): BillingCodeEntity
    {
        return BillingCodeEntity::fromResponse(
            $this->client->get("BillingCodes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see BillingCodeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): BillingCodeQueryBuilder
    {
        return new BillingCodeQueryBuilder($this->client);
    }

}
