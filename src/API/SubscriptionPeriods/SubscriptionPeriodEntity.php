<?php

namespace Anteris\Autotask\API\SubscriptionPeriods;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents SubscriptionPeriod entities.
 */
class SubscriptionPeriodEntity extends DataTransferObject
{
    public int $id;
    public float $periodCost;
    public Carbon $periodDate;
    public float $periodPrice;
    public ?Carbon $postedDate;
    public ?string $purchaseOrderNumber;
    public int $subscriptionID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['periodDate'] = new Carbon($array['periodDate']);
        $array['postedDate'] = new Carbon($array['postedDate']);
        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}
