<?php

namespace Anteris\Autotask\API\Currencies;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of Currency entities.
 * @see CurrencyEntity
 */
class CurrencyCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): CurrencyEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): CurrencyEntity
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
    public static function fromResponse(Response $response): CurrencyCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            CurrencyEntity::arrayOf($array['items'])
        );
    }
}
