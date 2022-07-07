<?php

namespace Anteris\Autotask\API\OrganizationalLevel2s;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of OrganizationalLevel2 entities.
 * @see OrganizationalLevel2Entity
 */
class OrganizationalLevel2Collection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): OrganizationalLevel2Entity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): OrganizationalLevel2Entity
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
    public static function fromResponse(Response $response): OrganizationalLevel2Collection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            OrganizationalLevel2Entity::arrayOf($array['items'])
        );
    }
}
