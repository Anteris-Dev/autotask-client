<?php

namespace Anteris\Autotask\API\Invoices;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Invoices.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InvoicesEntity.htm Autotask documentation.
 */
class InvoiceService
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
     * Finds the Invoice based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InvoiceEntity
    {
        return InvoiceEntity::fromResponse(
            $this->client->get("Invoices/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InvoiceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InvoiceQueryBuilder
    {
        return new InvoiceQueryBuilder($this->client);
    }

    /**
     * Updates the invoice.
     *
     * @param  InvoiceEntity  $resource  The invoice entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InvoiceEntity $resource): Response
    {
        return $this->client->put("Invoices", $resource->toArray());
    }
}
