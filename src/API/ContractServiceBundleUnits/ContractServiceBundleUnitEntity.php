<?php

namespace Anteris\Autotask\API\ContractServiceBundleUnits;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractServiceBundleUnit entities.
 */
class ContractServiceBundleUnitEntity extends DataTransferObject
{
    public ?Carbon $approveAndPostDate;
    public int $contractID;
    public ?int $contractServiceBundleID;
    public ?float $cost;
    public Carbon $endDate;
    public int $id;
    public ?float $internalCurrencyPrice;
    public ?int $organizationalLevelAssociationID;
    public ?float $price;
    public int $serviceBundleID;
    public Carbon $startDate;
    public int $units;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['approveAndPostDate'] = new Carbon($array['approveAndPostDate']);
        $array['endDate'] = new Carbon($array['endDate']);
        $array['startDate'] = new Carbon($array['startDate']);
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
