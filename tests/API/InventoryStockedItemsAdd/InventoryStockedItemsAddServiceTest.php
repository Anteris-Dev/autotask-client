<?php
use Anteris\Autotask\API\InventoryStockedItemsAdd\InventoryStockedItemsAddService;use Tests\AbstractTest;

/**
 * Runs tests for InventoryStockedItemsAddService.
 */
class InventoryStockedItemsAddServiceTest extends AbstractTest
{
    /**
     * @covers InventoryStockedItemsAddService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            InventoryStockedItemsAddService::class,
            $this->client->inventoryStockedItemsAdd()
        );
    }
}
