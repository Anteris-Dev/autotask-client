<?php

namespace Anteris\Autotask\API\ContractServiceAdjustments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractServiceAdjustments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServiceAdjustmentsEntity.htm Autotask documentation.
 */
class ContractServiceAdjustmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractserviceadjustment.
     *
     * @param  ContractServiceAdjustmentEntity  $resource  The contractserviceadjustment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractServiceAdjustmentEntity $resource)
    {
        $this->client->post("ContractServiceAdjustments", $resource->toArray());
    }



}
