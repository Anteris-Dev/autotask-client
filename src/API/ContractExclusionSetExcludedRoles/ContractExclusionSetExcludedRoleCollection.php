<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedRoles;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of ContractExclusionSetExcludedRole entities.
 * @see ContractExclusionSetExcludedRoleEntity
 */
class ContractExclusionSetExcludedRoleCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ContractExclusionSetExcludedRoleEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ContractExclusionSetExcludedRoleEntity
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
    public static function fromResponse(Response $response): ContractExclusionSetExcludedRoleCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ContractExclusionSetExcludedRoleEntity::arrayOf($array['items'])
        );
    }
}
