<?php

namespace Anteris\Autotask\API\SubscriptionPeriods;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of SubscriptionPeriod entities.
 * @see SubscriptionPeriodEntity
 */
class SubscriptionPeriodCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): SubscriptionPeriodEntity
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
    public static function fromResponse(Response $response): SubscriptionPeriodCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            SubscriptionPeriodEntity::arrayOf($array['items'])
        );
    }
}
