<?php

namespace Anteris\Autotask\API\PriceListProducts;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of PriceListProduct entities.
 * @see PriceListProductEntity
 */
class PriceListProductCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): PriceListProductEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): PriceListProductEntity
    {
        return parent::offsetGet($offset);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): PriceListProductCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            PriceListProductEntity::arrayOf($array['items'])
        );
    }
}
