<?php

namespace Anteris\Autotask\API\ContractBillingRules;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractBillingRule entities.
 */
class ContractBillingRuleEntity extends DataTransferObject
{
    public int $contractID;
    public bool $createChargesAsBillable;
    public ?float $dailyProratedCost;
    public ?float $dailyProratedPrice;
    public int $determineUnits;
    public ?Carbon $endDate;
    public ?int $executionMethod;
    public int $id;
    public bool $includeItemsInChargeDescription;
    public ?string $invoiceDescription;
    public bool $isActive;
    public bool $isDailyProrationEnabled;
    public ?int $maximumUnits;
    public ?int $minimumUnits;
    public int $productID;
    public Carbon $startDate;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
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
