<?php

namespace Anteris\Autotask\API\PurchaseOrderItems;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents PurchaseOrderItem entities.
 */
class PurchaseOrderItemEntity extends DataTransferObject
{
    public ?int $chargeID;
    public ?int $contractID;
    public ?Carbon $estimatedArrivalDate;
    public $id;
    public ?float $internalCurrencyUnitCost;
    public int $inventoryLocationID;
    public ?string $memo;
    public int $orderID;
    public ?int $productID;
    public $projectID;
    public int $quantity;
    public $salesOrderID;
    public $ticketID;
    public float $unitCost;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new PurchaseOrderItem entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['estimatedArrivalDate'])) {
            $array['estimatedArrivalDate'] = new Carbon($array['estimatedArrivalDate']);
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
