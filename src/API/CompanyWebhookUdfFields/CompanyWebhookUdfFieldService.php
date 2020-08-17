<?php

namespace Anteris\Autotask\API\CompanyWebhookUdfFields;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyWebhookUdfFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyWebhookUdfFieldsEntity.htm Autotask documentation.
 */
class CompanyWebhookUdfFieldService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(CompanyWebhookUdfFieldEntity $resource)
    {
        $this->client->post("CompanyWebhookUdfFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyWebhookUdfField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyWebhookUdfFields/$id");
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
    public function update(CompanyWebhookUdfFieldEntity $resource): void
    {
        $this->client->put("CompanyWebhookUdfFields/$resource->id", $resource->toArray());
    }
}
