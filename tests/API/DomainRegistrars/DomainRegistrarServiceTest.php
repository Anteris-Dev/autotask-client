<?php

use Anteris\Autotask\API\DomainRegistrars\DomainRegistrarCollection;
use Anteris\Autotask\API\DomainRegistrars\DomainRegistrarEntity;
use Anteris\Autotask\API\DomainRegistrars\DomainRegistrarService;
use Anteris\Autotask\API\DomainRegistrars\DomainRegistrarQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for DomainRegistrarService.
 */
class DomainRegistrarServiceTest extends AbstractTest
{
    /**
     * @covers DomainRegistrarService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            DomainRegistrarService::class,
            $this->client->domainRegistrars()
        );
    }

    /**
     * @covers DomainRegistrarService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->domainRegistrars()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            DomainRegistrarCollection::class,
            $result
        );
    }

    /**
     * @covers DomainRegistrarCollection
     */
    public function test_collection_contains_domain_registrar_entities()
    {
        $result = $this->client->domainRegistrars()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                DomainRegistrarEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers DomainRegistrarService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            DomainRegistrarQueryBuilder::class,
            $this->client->domainRegistrars()->query()
        );
    }
}
