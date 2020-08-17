<?php

namespace Anteris\Autotask\API\AdditionalInvoiceFieldValues;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask AdditionalInvoiceFieldValues.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/AdditionalInvoiceFieldValuesEntity.htm Autotask documentation.
 */
class AdditionalInvoiceFieldValueService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the AdditionalInvoiceFieldValue based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): AdditionalInvoiceFieldValueEntity
    {
        return AdditionalInvoiceFieldValueEntity::fromResponse(
            $this->client->get("AdditionalInvoiceFieldValues/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see AdditionalInvoiceFieldValueQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): AdditionalInvoiceFieldValueQueryBuilder
    {
        return new AdditionalInvoiceFieldValueQueryBuilder($this->client);
    }

}
