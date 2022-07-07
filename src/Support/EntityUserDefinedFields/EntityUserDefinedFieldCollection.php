<?php

namespace Anteris\Autotask\Support\EntityUserDefinedFields;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of entity user defined fields.
 * @see EntityUserDefinedFieldEntity
 */
class EntityUserDefinedFieldCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): EntityUserDefinedFieldEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): EntityUserDefinedFieldEntity
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
    public static function fromResponse(Response $response): EntityUserDefinedFieldCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['fields']) === false) {
            throw new \Exception('Missing fields key in response.');
        }

        return new static(
            EntityUserDefinedFieldEntity::arrayOf($array['fields'])
        );
    }
}
