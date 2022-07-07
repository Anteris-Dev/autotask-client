<?php
use Anteris\Autotask\API\InventoryStockedItemsRemove\InventoryStockedItemsRemoveService;use Tests\AbstractTest;

/**
 * Runs tests for InventoryStockedItemsRemoveService.
 */
class InventoryStockedItemsRemoveServiceTest extends AbstractTest
{
    /**
     * @covers InventoryStockedItemsRemoveService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryStockedItemsRemoveService::class,
            $this->client->inventoryStockedItemsRemove()
        );
    }
}
