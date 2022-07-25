<?php

namespace Anteris\Autotask\API\Projects;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of Project entities.
 * @see ProjectEntity
 */
class ProjectCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ProjectEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ProjectEntity
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
    public static function fromResponse(Response $response): ProjectCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ProjectEntity::arrayOf($array['items'])
        );
    }
}
