<?php

namespace Anteris\Autotask\API\TicketHistory;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of TicketHistory entities.
 * @see TicketHistoryEntity
 */
class TicketHistoryCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): TicketHistoryEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): TicketHistoryEntity
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
    public static function fromResponse(Response $response): TicketHistoryCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            TicketHistoryEntity::arrayOf($array['items'])
        );
    }
}
