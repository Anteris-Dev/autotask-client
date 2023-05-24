<?php

namespace Anteris\Autotask\API\CompanyWebhookFields;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanyWebhookFields.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyWebhookFieldsEntity.htm Autotask documentation.
 */
class CompanyWebhookFieldService
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
     * Creates a new companywebhookfield.
     *
     * @param  CompanyWebhookFieldEntity  $resource  The companywebhookfield entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyWebhookFieldEntity $resource): Response
    {
        $webhookID = $resource->webhookID;
        return $this->client->post("CompanyWebhooks/$webhookID/Fields", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $webhookID  ID of the CompanyWebhookField parent resource.
     * @param  int  $id  ID of the CompanyWebhookField to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $webhookID,int $id): void
    {
        $this->client->delete("CompanyWebhooks/$webhookID/Fields/$id");
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("CompanyWebhookFields/entityInformation/fields")
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
            $this->client->get("CompanyWebhookFields/entityInformation")
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
    public function update(CompanyWebhookFieldEntity $resource): Response
    {
        $webhookID = $resource->webhookID;
        return $this->client->put("CompanyWebhooks/$webhookID/Fields", $resource->toArray());
    }
}
