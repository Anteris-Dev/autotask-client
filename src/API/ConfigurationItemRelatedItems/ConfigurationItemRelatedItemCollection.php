<?php

namespace Anteris\Autotask\API\ConfigurationItemRelatedItems;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of ConfigurationItemRelatedItem entities.
 * @see ConfigurationItemRelatedItemEntity
 */
class ConfigurationItemRelatedItemCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ConfigurationItemRelatedItemEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ConfigurationItemRelatedItemEntity
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
    public static function fromResponse(Response $response): ConfigurationItemRelatedItemCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ConfigurationItemRelatedItemEntity::arrayOf($array['items'])
        );
    }
}
