<?php

namespace Anteris\Autotask\API\NotificationHistory;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of NotificationHistory entities.
 * @see NotificationHistoryEntity
 */
class NotificationHistoryCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): NotificationHistoryEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): NotificationHistoryEntity
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
    public static function fromResponse(Response $response): NotificationHistoryCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            NotificationHistoryEntity::arrayOf($array['items'])
        );
    }
}
