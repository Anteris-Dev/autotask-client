<?php

use Anteris\Autotask\API\CompanyAttachments\CompanyAttachmentCollection;
use Anteris\Autotask\API\CompanyAttachments\CompanyAttachmentEntity;
use Anteris\Autotask\API\CompanyAttachments\CompanyAttachmentService;
use Anteris\Autotask\API\CompanyAttachments\CompanyAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for CompanyAttachmentService.
 */
class CompanyAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers CompanyAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            CompanyAttachmentService::class,
            $this->client->companyAttachments()
        );
    }

    /**
     * @covers CompanyAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->companyAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            CompanyAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers CompanyAttachmentCollection
     */
    public function test_collection_contains_company_attachment_entities()
    {
        $result = $this->client->companyAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                CompanyAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers CompanyAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            CompanyAttachmentQueryBuilder::class,
            $this->client->companyAttachments()->query()
        );
    }
}
