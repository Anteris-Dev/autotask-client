<?php

namespace Anteris\Autotask\API\ContractServiceBundleAdjustments;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractServiceBundleAdjustment entities.
 */
class ContractServiceBundleAdjustmentEntity extends DataTransferObject
{
    public ?float $adjustedUnitPrice;
    public ?bool $allowRepeatServiceBundle;
    public ?int $contractID;
    public ?int $contractServiceBundleID;
    public Carbon $effectiveDate;
    public int $id;
    public ?int $quoteItemID;
    public ?int $serviceBundleID;
    public ?int $unitChange;
    public array $userDefinedFields = [];

    /**
     * Creates a new ContractServiceBundleAdjustment entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['effectiveDate'])) {
            $array['effectiveDate'] = new Carbon($array['effectiveDate']);
        }

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
