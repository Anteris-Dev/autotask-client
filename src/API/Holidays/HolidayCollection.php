<?php

namespace Anteris\Autotask\API\Holidays;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of Holiday entities.
 * @see HolidayEntity
 */
class HolidayCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): HolidayEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): HolidayEntity
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
    public static function fromResponse(Response $response): HolidayCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            HolidayEntity::arrayOf($array['items'])
        );
    }
}
