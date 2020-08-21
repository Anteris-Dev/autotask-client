<?php

namespace Anteris\Autotask\API\CompanyWebhookUdfFields;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanyWebhookUdfFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyWebhookUdfFieldsEntity.htm Autotask documentation.
 */
class CompanyWebhookUdfFieldService
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
     * Creates a new companywebhookudffield.
     *
     * @param  CompanyWebhookUdfFieldEntity  $resource  The companywebhookudffield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyWebhookUdfFieldEntity $resource): Response
    {
        $webhookID = $resource->webhookID;
        return $this->client->post("CompanyWebhooks/$webhookID/UdfFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $webhookID  ID of the CompanyWebhookUdfField parent resource.
     * @param  int  $id  ID of the CompanyWebhookUdfField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $webhookID,int $id): void
    {
        $this->client->delete("CompanyWebhooks/$webhookID/UdfFields/$id");
    }

    /**
     * Finds the CompanyWebhookUdfField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyWebhookUdfFieldEntity
    {
        return CompanyWebhookUdfFieldEntity::fromResponse(
            $this->client->get("CompanyWebhookUdfFields/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyWebhookUdfFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyWebhookUdfFieldQueryBuilder
    {
        return new CompanyWebhookUdfFieldQueryBuilder($this->client);
    }

    /**
     * Updates the companywebhookudffield.
     *
     * @param  CompanyWebhookUdfFieldEntity  $resource  The companywebhookudffield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyWebhookUdfFieldEntity $resource): Response
    {
        $webhookID = $resource->webhookID;
        return $this->client->put("CompanyWebhooks/$webhookID/UdfFields", $resource->toArray());
    }
}
