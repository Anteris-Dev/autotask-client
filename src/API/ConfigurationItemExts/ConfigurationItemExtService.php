<?php

namespace Anteris\Autotask\API\ConfigurationItemExts;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ConfigurationItemExts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemExtsEntity.htm Autotask documentation.
 */
class ConfigurationItemExtService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

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
    public function create(ConfigurationItemExtEntity $resource)
    {
        $this->client->post("ConfigurationItemExts", $resource->toArray());
    }



    /**
     * Updates the configurationitemext.
     *
     * @param  ConfigurationItemExtEntity  $resource  The configurationitemext entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemExtEntity $resource): void
    {
        $this->client->put("ConfigurationItemExts/$resource->id", $resource->toArray());
    }
}
