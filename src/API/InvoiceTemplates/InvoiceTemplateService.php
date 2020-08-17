<?php

namespace Anteris\Autotask\API\InvoiceTemplates;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask InvoiceTemplates.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InvoiceTemplatesEntity.htm Autotask documentation.
 */
class InvoiceTemplateService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the InvoiceTemplate based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InvoiceTemplateEntity
    {
        return InvoiceTemplateEntity::fromResponse(
            $this->client->get("InvoiceTemplates/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InvoiceTemplateQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InvoiceTemplateQueryBuilder
    {
        return new InvoiceTemplateQueryBuilder($this->client);
    }

}