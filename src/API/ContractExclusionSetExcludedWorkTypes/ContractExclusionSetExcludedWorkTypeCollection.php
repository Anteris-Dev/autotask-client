<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedWorkTypes;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of ContractExclusionSetExcludedWorkType entities.
 * @see ContractExclusionSetExcludedWorkTypeEntity
 */
class ContractExclusionSetExcludedWorkTypeCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ContractExclusionSetExcludedWorkTypeEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ContractExclusionSetExcludedWorkTypeEntity
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
    public static function fromResponse(Response $response): ContractExclusionSetExcludedWorkTypeCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ContractExclusionSetExcludedWorkTypeEntity::arrayOf($array['items'])
        );
    }
}
