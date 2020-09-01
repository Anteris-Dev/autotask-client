<?php

use Anteris\Autotask\API\PriceListWorkTypeModifiers\PriceListWorkTypeModifierCollection;
use Anteris\Autotask\API\PriceListWorkTypeModifiers\PriceListWorkTypeModifierEntity;
use Anteris\Autotask\API\PriceListWorkTypeModifiers\PriceListWorkTypeModifierService;
use Anteris\Autotask\API\PriceListWorkTypeModifiers\PriceListWorkTypeModifierQueryBuilder;
use Tests\AbstractTest;

/**
 * Runs tests for PriceListWorkTypeModifierService.
 */
class PriceListWorkTypeModifierServiceTest extends AbstractTest
{
    /**
     * @covers PriceListWorkTypeModifierService
     */
    public function test_service_creation()
    {
        $this->assertInstanceOf(
            PriceListWorkTypeModifierService::class,
            $this->client->priceListWorkTypeModifiers()
        );
    }

    /**
     * @covers PriceListWorkTypeModifierService
     */
    public function test_query_returns_collection()
    {
        $result = $this->client->priceListWorkTypeModifiers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure its a collection
        $this->assertInstanceOf(
            PriceListWorkTypeModifierCollection::class,
            $result
        );
    }

    /**
     * @covers PriceListWorkTypeModifierCollection
     */
    public function test_collection_contains_price_list_work_type_modifier_entities()
    {
        $result = $this->client->priceListWorkTypeModifiers()->query()->where('id', 'exist')->records(1)->get();

        // Make sure the collection has entities
        if (count($result) > 0) {
            $this->assertInstanceOf(
                PriceListWorkTypeModifierEntity::class,
                $result->offsetGet(0)
            );
        } else {
            $this->assertCount(0, $result);
        }
    }

    /**
     * @covers PriceListWorkTypeModifierService
     */
    public function test_query_method_returns_query_builder()
    {
        $this->assertInstanceOf(
            PriceListWorkTypeModifierQueryBuilder::class,
            $this->client->priceListWorkTypeModifiers()->query()
        );
    }
}
