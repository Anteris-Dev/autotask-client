<?php

namespace Anteris\Autotask\API\ConfigurationItemCategoryUdfAssociations;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of ConfigurationItemCategoryUdfAssociation entities.
 * @see ConfigurationItemCategoryUdfAssociationEntity
 */
class ConfigurationItemCategoryUdfAssociationCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ConfigurationItemCategoryUdfAssociationEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ConfigurationItemCategoryUdfAssociationEntity
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
    public static function fromResponse(Response $response): ConfigurationItemCategoryUdfAssociationCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ConfigurationItemCategoryUdfAssociationEntity::arrayOf($array['items'])
        );
    }
}
