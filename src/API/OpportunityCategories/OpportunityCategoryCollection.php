<?php

namespace Anteris\Autotask\API\OpportunityCategories;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of OpportunityCategory entities.
 * @see OpportunityCategoryEntity
 */
class OpportunityCategoryCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): OpportunityCategoryEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): OpportunityCategoryEntity
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
    public static function fromResponse(Response $response): OpportunityCategoryCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            OpportunityCategoryEntity::arrayOf($array['items'])
        );
    }
}
