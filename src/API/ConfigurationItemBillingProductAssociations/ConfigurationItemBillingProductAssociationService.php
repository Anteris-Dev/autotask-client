<?php

namespace Anteris\Autotask\API\ConfigurationItemBillingProductAssociations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItemBillingProductAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemBillingProductAssociationsEntity.htm Autotask documentation.
 */
class ConfigurationItemBillingProductAssociationService
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
     * Creates a new configurationitembillingproductassociation.
     *
     * @param  ConfigurationItemBillingProductAssociationEntity  $resource  The configurationitembillingproductassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemBillingProductAssociationEntity $resource): Response
    {
        $configurationItemID = $resource->configurationItemID;
        return $this->client->post("ConfigurationItems/$configurationItemID/BillingProductAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $configurationItemID  ID of the ConfigurationItemBillingProductAssociation parent resource.
     * @param  int  $id  ID of the ConfigurationItemBillingProductAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $configurationItemID,int $id): void
    {
        $this->client->delete("ConfigurationItems/$configurationItemID/BillingProductAssociations/$id");
    }

    /**
     * Finds the ConfigurationItemBillingProductAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemBillingProductAssociationEntity
    {
        return ConfigurationItemBillingProductAssociationEntity::fromResponse(
            $this->client->get("ConfigurationItemBillingProductAssociations/$id")
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
            $this->client->get("ConfigurationItemBillingProductAssociations/entityInformation/fields")
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
            $this->client->get("ConfigurationItemBillingProductAssociations/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemBillingProductAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemBillingProductAssociationQueryBuilder
    {
        return new ConfigurationItemBillingProductAssociationQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitembillingproductassociation.
     *
     * @param  ConfigurationItemBillingProductAssociationEntity  $resource  The configurationitembillingproductassociation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemBillingProductAssociationEntity $resource): Response
    {
        $configurationItemID = $resource->configurationItemID;
        return $this->client->put("ConfigurationItems/$configurationItemID/BillingProductAssociations", $resource->toArray());
    }
}
