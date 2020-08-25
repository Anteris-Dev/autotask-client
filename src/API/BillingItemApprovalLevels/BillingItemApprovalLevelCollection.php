<?php

namespace Anteris\Autotask\API\BillingItemApprovalLevels;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of BillingItemApprovalLevel entities.
 * @see BillingItemApprovalLevelEntity
 */
class BillingItemApprovalLevelCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): BillingItemApprovalLevelEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): BillingItemApprovalLevelEntity
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
    public static function fromResponse(Response $response): BillingItemApprovalLevelCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            BillingItemApprovalLevelEntity::arrayOf($array['items'])
        );
    }
}
