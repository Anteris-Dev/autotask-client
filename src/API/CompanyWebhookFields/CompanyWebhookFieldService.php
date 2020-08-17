<?php

namespace Anteris\Autotask\API\CompanyWebhookFields;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask CompanyWebhookFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyWebhookFieldsEntity.htm Autotask documentation.
 */
class CompanyWebhookFieldService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new companywebhookfield.
     *
     * @param  CompanyWebhookFieldEntity  $resource  The companywebhookfield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyWebhookFieldEntity $resource)
    {
        $this->client->post("CompanyWebhookFields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyWebhookField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyWebhookFields/$id");
    }

    /**
     * Finds the CompanyWebhookField based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyWebhookFieldEntity
    {
        return CompanyWebhookFieldEntity::fromResponse(
            $this->client->get("CompanyWebhookFields/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyWebhookFieldQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyWebhookFieldQueryBuilder
    {
        return new CompanyWebhookFieldQueryBuilder($this->client);
    }

    /**
     * Updates the companywebhookfield.
     *
     * @param  CompanyWebhookFieldEntity  $resource  The companywebhookfield entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyWebhookFieldEntity $resource): void
    {
        $this->client->put("CompanyWebhookFields/$resource->id", $resource->toArray());
    }
}
