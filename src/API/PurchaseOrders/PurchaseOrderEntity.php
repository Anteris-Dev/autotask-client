<?php

namespace Anteris\Autotask\API\PurchaseOrders;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents PurchaseOrder entities.
 */
class PurchaseOrderEntity extends DataTransferObject
{
    public ?Carbon $cancelDateTime;
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public ?string $externalPONumber;
    public ?string $fax;
    public ?float $freight;
    public ?string $generalMemo;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public ?float $internalCurrencyFreight;
    public ?Carbon $latestEstimatedArrivalDate;
    public ?int $paymentTerm;
    public ?string $phone;
    public ?int $purchaseForCompanyID;
    public ?string $purchaseOrderNumber;
    public ?int $purchaseOrderTemplateID;
    public ?Carbon $shippingDate;
    public ?int $shippingType;
    public string $shipToAddress1;
    public ?string $shipToAddress2;
    public ?string $shipToCity;
    public string $shipToName;
    public ?string $shipToPostalCode;
    public ?string $shipToState;
    public ?bool $showEachTaxInGroup;
    public ?bool $showTaxCategory;
    public int $status;
    public ?Carbon $submitDateTime;
    public ?int $taxRegionID;
    public ?int $useItemDescriptionsFrom;
    public int $vendorID;
    public ?string $vendorInvoiceNumber;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new PurchaseOrder entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['cancelDateTime'])) {
            $array['cancelDateTime'] = new Carbon($array['cancelDateTime']);
        }

        if (isset($array['createDateTime'])) {
            $array['createDateTime'] = new Carbon($array['createDateTime']);
        }

        if (isset($array['latestEstimatedArrivalDate'])) {
            $array['latestEstimatedArrivalDate'] = new Carbon($array['latestEstimatedArrivalDate']);
        }

        if (isset($array['shippingDate'])) {
            $array['shippingDate'] = new Carbon($array['shippingDate']);
        }

        if (isset($array['submitDateTime'])) {
            $array['submitDateTime'] = new Carbon($array['submitDateTime']);
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
