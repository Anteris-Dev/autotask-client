<?php

namespace Anteris\Autotask\API\ContractServiceBundleAdjustments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ContractServiceBundleAdjustments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServiceBundleAdjustmentsEntity.htm Autotask documentation.
 */
class ContractServiceBundleAdjustmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new contractservicebundleadjustment.
     *
     * @param  ContractServiceBundleAdjustmentEntity  $resource  The contractservicebundleadjustment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractServiceBundleAdjustmentEntity $resource)
    {
        $this->client->post("ContractServiceBundleAdjustments", $resource->toArray());
    }



}
