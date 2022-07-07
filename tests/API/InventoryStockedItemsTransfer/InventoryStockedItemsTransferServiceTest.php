<?php
use Anteris\Autotask\API\InventoryStockedItemsTransfer\InventoryStockedItemsTransferService;use Tests\AbstractTest;

/**
 * Runs tests for InventoryStockedItemsTransferService.
 */
class InventoryStockedItemsTransferServiceTest extends AbstractTest
{
    /**
     * @covers InventoryStockedItemsTransferService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryStockedItemsTransferService::class,
            $this->client->inventoryStockedItemsTransfer()
        );
    }
}
