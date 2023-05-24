<?php

namespace Anteris\Autotask\API\ConfigurationItemDnsRecords;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;

/**
 * Handles all interaction with Autotask ConfigurationItemDnsRecords.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemDnsRecordsEntity.htm Autotask documentation.
 */
class ConfigurationItemDnsRecordService
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
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ConfigurationItemDnsRecord to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ConfigurationItemDnsRecords/$id");
    }

    /**
     * Finds the ConfigurationItemDnsRecord based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemDnsRecordEntity
    {
        return ConfigurationItemDnsRecordEntity::fromResponse(
            $this->client->get("ConfigurationItemDnsRecords/$id")
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
            $this->client->get("ConfigurationItemDnsRecords/entityInformation/fields")
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
            $this->client->get("ConfigurationItemDnsRecords/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemDnsRecordQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemDnsRecordQueryBuilder
    {
        return new ConfigurationItemDnsRecordQueryBuilder($this->client);
    }
}
