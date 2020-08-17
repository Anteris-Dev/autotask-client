<?php

namespace Anteris\Autotask\API\ConfigurationItemBillingProductAssociations;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ConfigurationItemBillingProductAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemBillingProductAssociationsEntity.htm Autotask documentation.
 */
class ConfigurationItemBillingProductAssociationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(ConfigurationItemBillingProductAssociationEntity $resource)
    {
        $this->client->post("ConfigurationItemBillingProductAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ConfigurationItemBillingProductAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ConfigurationItemBillingProductAssociations/$id");
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
    public function update(ConfigurationItemBillingProductAssociationEntity $resource): void
    {
        $this->client->put("ConfigurationItemBillingProductAssociations/$resource->id", $resource->toArray());
    }
}
