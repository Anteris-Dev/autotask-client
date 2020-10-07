<?php

use Anteris\Autotask\API\CompanyNoteAttachments\CompanyNoteAttachmentCollection;
use Anteris\Autotask\API\CompanyNoteAttachments\CompanyNoteAttachmentEntity;
use Anteris\Autotask\API\CompanyNoteAttachments\CompanyNoteAttachmentService;
use Anteris\Autotask\API\CompanyNoteAttachments\CompanyNoteAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyNoteAttachmentService.
 */
class CompanyNoteAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers CompanyNoteAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyNoteAttachmentService::class,
            $this->client->companyNoteAttachments()
        );
    }

    /**
     * @covers CompanyNoteAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->companyNoteAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CompanyNoteAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers CompanyNoteAttachmentCollection
     */
    public function test_collection_contains_company_note_attachment_entities()
    {
        $result = $this->client->companyNoteAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CompanyNoteAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CompanyNoteAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CompanyNoteAttachmentQueryBuilder::class,
            $this->client->companyNoteAttachments()->query()
        );
    }
}
