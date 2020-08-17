<?php

namespace Anteris\Autotask\API\PriceListWorkTypeModifiers;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of PriceListWorkTypeModifier entities.
 * @see PriceListWorkTypeModifierEntity
 */
class PriceListWorkTypeModifierCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): PriceListWorkTypeModifierEntity
    {
        return parent::current();
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): PriceListWorkTypeModifierCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            PriceListWorkTypeModifierEntity::arrayOf($array['items'])
        );
    }
}
