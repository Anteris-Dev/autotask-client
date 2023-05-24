<?php

namespace Anteris\Autotask\API\AdditionalInvoiceFieldValues;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;

/**
 * Handles all interaction with Autotask AdditionalInvoiceFieldValues.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/AdditionalInvoiceFieldValuesEntity.htm Autotask documentation.
 */
class AdditionalInvoiceFieldValueService
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
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("AdditionalInvoiceFieldValues/entityInformation/fields")
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
            $this->client->get("AdditionalInvoiceFieldValues/entityInformation")
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
