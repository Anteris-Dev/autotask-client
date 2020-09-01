<?php
use Anteris\Autotask\API\TicketChecklistLibraries\TicketChecklistLibraryService;use Tests\AbstractTest;

/**
 * Runs tests for TicketChecklistLibraryService.
 */
class TicketChecklistLibraryServiceTest extends AbstractTest
{
    /**
     * @covers TicketChecklistLibraryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            TicketChecklistLibraryService::class,
            $this->client->ticketChecklistLibraries()
        );
    }
}
