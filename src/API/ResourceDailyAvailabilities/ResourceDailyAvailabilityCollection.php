<?php

namespace Anteris\Autotask\API\ResourceDailyAvailabilities;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of ResourceDailyAvailability entities.
 * @see ResourceDailyAvailabilityEntity
 */
class ResourceDailyAvailabilityCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ResourceDailyAvailabilityEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ResourceDailyAvailabilityEntity
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
    public static function fromResponse(Response $response): ResourceDailyAvailabilityCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ResourceDailyAvailabilityEntity::arrayOf($array['items'])
        );
    }
}
