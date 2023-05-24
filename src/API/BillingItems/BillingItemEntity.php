<?php

namespace Anteris\Autotask\API\BillingItems;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents BillingItem entities.
 */
class BillingItemEntity extends DataTransferObject
{
    public ?int $accountManagerWhenApprovedID;
    public ?int $billingCodeID;
    public int $billingItemType;
    public ?int $companyID;
    public $configurationItemID;
    public ?int $contractBlockID;
    public $contractChargeID;
    public ?int $contractID;
    public ?int $contractServiceAdjustmentID;
    public ?int $contractServiceBundleAdjustmentID;
    public ?int $contractServiceBundleID;
    public ?int $contractServiceBundlePeriodID;
    public ?int $contractServiceID;
    public ?int $contractServicePeriodID;
    public ?string $description;
    public ?int $expenseItemID;
    public ?float $extendedPrice;
    public $id;
    public ?float $internalCurrencyExtendedPrice;
    public ?float $internalCurrencyRate;
    public ?float $internalCurrencyTaxDollars;
    public ?float $internalCurrencyTotalAmount;
    public ?int $invoiceID;
    public ?int $itemApproverID;
    public ?Carbon $itemDate;
    public ?string $itemName;
    public ?string $lineItemFullDescription;
    public ?string $lineItemGroupDescription;
    public $milestoneID;
    public int $nonBillable;
    public ?int $organizationalLevelAssociationID;
    public ?float $ourCost;
    public ?Carbon $postedDate;
    public ?Carbon $postedOnTime;
    public $projectChargeID;
    public ?int $projectID;
    public ?string $purchaseOrderNumber;
    public ?float $quantity;
    public ?float $rate;
    public ?int $roleID;
    public $serviceBundleID;
    public $serviceID;
    public $sortOrderID;
    public int $subType;
    public ?int $taskID;
    public ?float $taxDollars;
    public $ticketChargeID;
    public ?int $ticketID;
    public ?int $timeEntryID;
    public ?float $totalAmount;
    public $vendorID;
    public ?Carbon $webServiceDate;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new BillingItem entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['itemDate'])) {
            $array['itemDate'] = new Carbon($array['itemDate']);
        }

        if (isset($array['postedDate'])) {
            $array['postedDate'] = new Carbon($array['postedDate']);
        }

        if (isset($array['postedOnTime'])) {
            $array['postedOnTime'] = new Carbon($array['postedOnTime']);
        }

        if (isset($array['webServiceDate'])) {
            $array['webServiceDate'] = new Carbon($array['webServiceDate']);
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
