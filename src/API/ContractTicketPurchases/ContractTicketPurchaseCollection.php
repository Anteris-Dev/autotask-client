<?php

namespace Anteris\Autotask\API\ContractTicketPurchases;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of ContractTicketPurchase entities.
 * @see ContractTicketPurchaseEntity
 */
class ContractTicketPurchaseCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ContractTicketPurchaseEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ContractTicketPurchaseEntity
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
    public static function fromResponse(Response $response): ContractTicketPurchaseCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ContractTicketPurchaseEntity::arrayOf($array['items'])
        );
    }
}
