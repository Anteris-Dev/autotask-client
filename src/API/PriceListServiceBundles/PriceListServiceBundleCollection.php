<?php

namespace Anteris\Autotask\API\PriceListServiceBundles;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of PriceListServiceBundle entities.
 * @see PriceListServiceBundleEntity
 */
class PriceListServiceBundleCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): PriceListServiceBundleEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): PriceListServiceBundleEntity
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
    public static function fromResponse(Response $response): PriceListServiceBundleCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            PriceListServiceBundleEntity::arrayOf($array['items'])
        );
    }
}
