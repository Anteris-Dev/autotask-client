<?php

use Anteris\Autotask\API\OpportunityAttachments\OpportunityAttachmentCollection;
use Anteris\Autotask\API\OpportunityAttachments\OpportunityAttachmentEntity;
use Anteris\Autotask\API\OpportunityAttachments\OpportunityAttachmentService;
use Anteris\Autotask\API\OpportunityAttachments\OpportunityAttachmentQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for OpportunityAttachmentService.
 */
class OpportunityAttachmentServiceTest extends AbstractTest
{
    /**
     * @covers OpportunityAttachmentService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            OpportunityAttachmentService::class,
            $this->client->opportunityAttachments()
        );
    }

    /**
     * @covers OpportunityAttachmentService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->opportunityAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            OpportunityAttachmentCollection::class,
            $result
        );
    }

    /**
     * @covers OpportunityAttachmentCollection
     */
    public function test_collection_contains_opportunity_attachment_entities()
    {
        $result = $this->client->opportunityAttachments()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                OpportunityAttachmentEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers OpportunityAttachmentService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            OpportunityAttachmentQueryBuilder::class,
            $this->client->opportunityAttachments()->query()
        );
    }
}
