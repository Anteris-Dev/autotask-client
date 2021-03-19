<?php
use Anteris\Autotask\API\DocumentChecklistLibraries\DocumentChecklistLibraryService;use Tests\AbstractTest;

/**
 * Runs tests for DocumentChecklistLibraryService.
 */
class DocumentChecklistLibraryServiceTest extends AbstractTest
{
    /**
     * @covers DocumentChecklistLibraryService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DocumentChecklistLibraryService::class,
            $this->client->documentChecklistLibraries()
        );
    }
}
