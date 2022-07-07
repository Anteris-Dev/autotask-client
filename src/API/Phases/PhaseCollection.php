<?php

namespace Anteris\Autotask\API\Phases;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of Phase entities.
 * @see PhaseEntity
 */
class PhaseCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): PhaseEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): PhaseEntity
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
    public static function fromResponse(Response $response): PhaseCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            PhaseEntity::arrayOf($array['items'])
        );
    }
}
