<?php
use Anteris\Autotask\API\ConfigurationItemExts\ConfigurationItemExtService;use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemExtService.
 */
class ConfigurationItemExtServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemExtService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemExtService::class,
            $this->client->configurationItemExts()
        );
    }
}
