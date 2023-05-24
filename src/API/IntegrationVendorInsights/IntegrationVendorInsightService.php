<?php

namespace Anteris\Autotask\API\IntegrationVendorInsights;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask IntegrationVendorInsights.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/IntegrationVendorInsightsEntity.htm Autotask documentation.
 */
class IntegrationVendorInsightService
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
     * Creates a new integrationvendorinsight.
     *
     * @param  IntegrationVendorInsightEntity  $resource  The integrationvendorinsight entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(IntegrationVendorInsightEntity $resource): Response
    {
        return $this->client->post("IntegrationVendorInsights", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the IntegrationVendorInsight to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("IntegrationVendorInsights/$id");
    }

    /**
     * Finds the IntegrationVendorInsight based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): IntegrationVendorInsightEntity
    {
        return IntegrationVendorInsightEntity::fromResponse(
            $this->client->get("IntegrationVendorInsights/$id")
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
            $this->client->get("IntegrationVendorInsights/entityInformation/fields")
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
            $this->client->get("IntegrationVendorInsights/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see IntegrationVendorInsightQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): IntegrationVendorInsightQueryBuilder
    {
        return new IntegrationVendorInsightQueryBuilder($this->client);
    }

    /**
     * Updates the integrationvendorinsight.
     *
     * @param  IntegrationVendorInsightEntity  $resource  The integrationvendorinsight entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(IntegrationVendorInsightEntity $resource): Response
    {
        return $this->client->put("IntegrationVendorInsights", $resource->toArray());
    }
}
