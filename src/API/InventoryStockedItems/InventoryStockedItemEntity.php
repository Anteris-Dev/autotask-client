<?php

namespace Anteris\Autotask\API\InventoryStockedItems;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents InventoryStockedItem entities.
 */
class InventoryStockedItemEntity extends DataTransferObject
{
    public ?int $availableUnits;
    public ?int $companyID;
    public ?int $configurationItemID;
    public ?int $contractChargeID;
    public ?Carbon $createDateTime;
    public ?int $createdByResourceID;
    public ?int $currentInventoryLocationID;
    public ?int $deliveredUnits;
    public $id;
    public int $inventoryProductID;
    public ?int $onHandUnits;
    public ?int $parentInventoryStockedItemID;
    public ?int $parentStockedItemReceivedUnits;
    public ?int $pickedRemovedByResourceID;
    public ?Carbon $pickedRemovedDateTime;
    public ?int $pickedUnits;
    public ?int $projectChargeID;
    public ?int $purchaseOrderID;
    public ?int $purchaseOrderItemID;
    public ?int $purchaseOrderItemReceivingID;
    public ?int $quoteItemID;
    public ?int $removedUnits;
    public ?int $reservedUnits;
    public ?float $returnPrice;
    public ?int $returnTypeID;
    public ?string $serialNumber;
    public ?int $statusID;
    public ?int $ticketChargeID;
    public ?int $transferredUnits;
    public float $unitCost;
    public ?int $vendorID;
    public ?string $vendorInvoiceNumber;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new InventoryStockedItem entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDateTime'])) {
            $array['createDateTime'] = new Carbon($array['createDateTime']);
        }

        if (isset($array['pickedRemovedDateTime'])) {
            $array['pickedRemovedDateTime'] = new Carbon($array['pickedRemovedDateTime']);
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
