<?php

namespace Anteris\Autotask\API\ProductVendors;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of ProductVendor entities.
 * @see ProductVendorEntity
 */
class ProductVendorCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ProductVendorEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ProductVendorEntity
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
    public static function fromResponse(Response $response): ProductVendorCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ProductVendorEntity::arrayOf($array['items'])
        );
    }
}
