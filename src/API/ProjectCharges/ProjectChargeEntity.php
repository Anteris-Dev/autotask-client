<?php

namespace Anteris\Autotask\API\ProjectCharges;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ProjectCharge entities.
 */
class ProjectChargeEntity extends DataTransferObject
{
    public ?float $billableAmount;
    public ?int $billingCodeID;
    public int $chargeType;
    public ?int $contractServiceBundleID;
    public ?int $contractServiceID;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public Carbon $datePurchased;
    public ?string $description;
    public ?float $estimatedCost;
    public ?float $extendedCost;
    public int $id;
    public ?float $internalCurrencyBillableAmount;
    public ?float $internalCurrencyUnitPrice;
    public ?string $internalPurchaseOrderNumber;
    public ?bool $isBillableToCompany;
    public ?bool $isBilled;
    public string $name;
    public ?string $notes;
    public ?int $organizationalLevelAssociationID;
    public ?int $productID;
    public int $projectID;
    public ?string $purchaseOrderNumber;
    public ?int $status;
    public ?int $statusLastModifiedBy;
    public ?Carbon $statusLastModifiedDate;
    public ?float $unitCost;
    public ?float $unitPrice;
    public float $unitQuantity;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDate'] = new Carbon($array['createDate']);
        $array['datePurchased'] = new Carbon($array['datePurchased']);
        $array['statusLastModifiedDate'] = new Carbon($array['statusLastModifiedDate']);
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
