<?php

namespace Anteris\Autotask\API\CompanyCategories;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of CompanyCategory entities.
 * @see CompanyCategoryEntity
 */
class CompanyCategoryCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): CompanyCategoryEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): CompanyCategoryEntity
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
    public static function fromResponse(Response $response): CompanyCategoryCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            CompanyCategoryEntity::arrayOf($array['items'])
        );
    }
}
