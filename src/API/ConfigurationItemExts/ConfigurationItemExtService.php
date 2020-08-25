<?php

namespace Anteris\Autotask\API\ConfigurationItemExts;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use Anteris\Autotask\Support\EntityUserDefinedFields\EntityUserDefinedFieldCollection;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ConfigurationItemExts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemExtsEntity.htm Autotask documentation.
 */
class ConfigurationItemExtService
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
     * Creates a new configurationitemext.
     *
     * @param  ConfigurationItemExtEntity  $resource  The configurationitemext entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemExtEntity $resource): Response
    {
        return $this->client->post("ConfigurationItemExts", $resource->toArray());
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
            $this->client->get("ConfigurationItemExts/entityInformation/fields")
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
            $this->client->get("ConfigurationItemExts/entityInformation")
        );
    }

    /**
     * Returns information about what user defined fields an entity has.
     *
     * @see EntityUserDefinedFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityUserDefinedFields(): EntityUserDefinedFieldCollection
    {
        return EntityUserDefinedFieldCollection::fromResponse(
            $this->client->get("ConfigurationItemExts/entityInformation/userDefinedFields")
        );
    }

    /**
     * Updates the configurationitemext.
     *
     * @param  ConfigurationItemExtEntity  $resource  The configurationitemext entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemExtEntity $resource): Response
    {
        return $this->client->put("ConfigurationItemExts", $resource->toArray());
    }
}
