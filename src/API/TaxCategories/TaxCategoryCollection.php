<?php

namespace Anteris\Autotask\API\TaxCategories;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of TaxCategory entities.
 * @see TaxCategoryEntity
 */
class TaxCategoryCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): TaxCategoryEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): TaxCategoryEntity
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
    public static function fromResponse(Response $response): TaxCategoryCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            TaxCategoryEntity::arrayOf($array['items'])
        );
    }
}
