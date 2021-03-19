<?php

use Anteris\Autotask\API\DocumentTicketAssociations\DocumentTicketAssociationCollection;
use Anteris\Autotask\API\DocumentTicketAssociations\DocumentTicketAssociationEntity;
use Anteris\Autotask\API\DocumentTicketAssociations\DocumentTicketAssociationService;
use Anteris\Autotask\API\DocumentTicketAssociations\DocumentTicketAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DocumentTicketAssociationService.
 */
class DocumentTicketAssociationServiceTest extends AbstractTest
{
    /**
     * @covers DocumentTicketAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DocumentTicketAssociationService::class,
            $this->client->documentTicketAssociations()
        );
    }

    /**
     * @covers DocumentTicketAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->documentTicketAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DocumentTicketAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers DocumentTicketAssociationCollection
     */
    public function test_collection_contains_document_ticket_association_entities()
    {
        $result = $this->client->documentTicketAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DocumentTicketAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DocumentTicketAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DocumentTicketAssociationQueryBuilder::class,
            $this->client->documentTicketAssociations()->query()
        );
    }
}
