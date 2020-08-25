<?php

namespace Anteris\Autotask\API\ContractCharges;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractCharge entities.
 */
class ContractChargeEntity extends DataTransferObject
{
    public ?float $billableAmount;
    public ?int $billingCodeID;
    public int $chargeType;
    public int $contractID;
    public ?int $contractServiceBundleID;
    public ?int $contractServiceID;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public Carbon $datePurchased;
    public ?string $description;
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
    public ?string $purchaseOrderNumber;
    public ?int $status;
    public ?int $statusLastModifiedBy;
    public ?Carbon $statusLastModifiedDate;
    public ?float $unitCost;
    public ?float $unitPrice;
    public float $unitQuantity;

    /**
     * Creates a new ContractCharge entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['datePurchased'])) {
            $array['datePurchased'] = new Carbon($array['datePurchased']);
        }

        if (isset($array['statusLastModifiedDate'])) {
            $array['statusLastModifiedDate'] = new Carbon($array['statusLastModifiedDate']);
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
