<?php
use Anteris\Autotask\API\ContractServiceAdjustments\ContractServiceAdjustmentService;use Tests\AbstractTest;

/**
 * Runs tests for ContractServiceAdjustmentService.
 */
class ContractServiceAdjustmentServiceTest extends AbstractTest
{
    /**
     * @covers ContractServiceAdjustmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ContractServiceAdjustmentService::class,
            $this->client->contractServiceAdjustments()
        );
    }
}
