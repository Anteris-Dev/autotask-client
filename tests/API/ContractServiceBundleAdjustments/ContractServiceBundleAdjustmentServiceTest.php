<?php
use Anteris\Autotask\API\ContractServiceBundleAdjustments\ContractServiceBundleAdjustmentService;use Tests\AbstractTest;

/**
 * Runs tests for ContractServiceBundleAdjustmentService.
 */
class ContractServiceBundleAdjustmentServiceTest extends AbstractTest
{
    /**
     * @covers ContractServiceBundleAdjustmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractServiceBundleAdjustmentService::class,
            $this->client->contractServiceBundleAdjustments()
        );
    }
}
