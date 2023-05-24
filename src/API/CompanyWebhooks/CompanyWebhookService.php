<?php

namespace Anteris\Autotask\API\CompanyWebhooks;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask CompanyWebhooks.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompanyWebhooksEntity.htm Autotask documentation.
 */
class CompanyWebhookService
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
     * Creates a new companywebhook.
     *
     * @param  CompanyWebhookEntity  $resource  The companywebhook entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyWebhookEntity $resource): Response
    {
        return $this->client->post("CompanyWebhooks", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the CompanyWebhook to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("CompanyWebhooks/$id");
    }

    /**
     * Finds the CompanyWebhook based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyWebhookEntity
    {
        return CompanyWebhookEntity::fromResponse(
            $this->client->get("CompanyWebhooks/$id")
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
            $this->client->get("CompanyWebhooks/entityInformation/fields")
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
            $this->client->get("CompanyWebhooks/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyWebhookQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyWebhookQueryBuilder
    {
        return new CompanyWebhookQueryBuilder($this->client);
    }

    /**
     * Updates the companywebhook.
     *
     * @param  CompanyWebhookEntity  $resource  The companywebhook entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyWebhookEntity $resource): Response
    {
        return $this->client->put("CompanyWebhooks", $resource->toArray());
    }
}
