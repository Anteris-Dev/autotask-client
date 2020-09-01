<?php

use Anteris\Autotask\API\ConfigurationItemBillingProductAssociations\ConfigurationItemBillingProductAssociationCollection;
use Anteris\Autotask\API\ConfigurationItemBillingProductAssociations\ConfigurationItemBillingProductAssociationEntity;
use Anteris\Autotask\API\ConfigurationItemBillingProductAssociations\ConfigurationItemBillingProductAssociationService;
use Anteris\Autotask\API\ConfigurationItemBillingProductAssociations\ConfigurationItemBillingProductAssociationQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for ConfigurationItemBillingProductAssociationService.
 */
class ConfigurationItemBillingProductAssociationServiceTest extends AbstractTest
{
    /**
     * @covers ConfigurationItemBillingProductAssociationService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            ConfigurationItemBillingProductAssociationService::class,
            $this->client->configurationItemBillingProductAssociations()
        );
    }

    /**
     * @covers ConfigurationItemBillingProductAssociationService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->configurationItemBillingProductAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            ConfigurationItemBillingProductAssociationCollection::class,
            $result
        );
    }

    /**
     * @covers ConfigurationItemBillingProductAssociationCollection
     */
    public function test_collection_contains_configuration_item_billing_product_association_entities()
    {
        $result = $this->client->configurationItemBillingProductAssociations()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                ConfigurationItemBillingProductAssociationEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers ConfigurationItemBillingProductAssociationService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            ConfigurationItemBillingProductAssociationQueryBuilder::class,
            $this->client->configurationItemBillingProductAssociations()->query()
        );
    }
}
