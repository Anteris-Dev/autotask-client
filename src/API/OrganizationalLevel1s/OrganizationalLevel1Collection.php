<?php

namespace Anteris\Autotask\API\OrganizationalLevel1s;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of OrganizationalLevel1 entities.
 * @see OrganizationalLevel1Entity
 */
class OrganizationalLevel1Collection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): OrganizationalLevel1Entity
    {
        return parent::current();
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): OrganizationalLevel1Collection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            OrganizationalLevel1Entity::arrayOf($array['items'])
        );
    }
}
