<?php

namespace Anteris\Autotask\Support\EntityFields;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of entity fields.
 * @see EntityFieldEntity
 */
class EntityFieldCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): EntityFieldEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): EntityFieldEntity
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
    public static function fromResponse(Response $response): EntityFieldCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['fields']) === false) {
            throw new \Exception('Missing fields key in response.');
        }

        return new static(
            EntityFieldEntity::arrayOf($array['fields'])
        );
    }
}
