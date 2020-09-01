<?php

namespace Anteris\Autotask\API\InventoryItems;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents InventoryItem entities.
 */
class InventoryItemEntity extends DataTransferObject
{
    public ?int $backOrderQuantity;
    public ?string $bin;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public int $inventoryLocationID;
    public int $productID;
    public int $quantityMaximum;
    public int $quantityMinimum;
    public int $quantityOnHand;
    public ?int $quantityOnOrder;
    public ?int $quantityPicked;
    public ?int $quantityReserved;
    public ?string $referenceNumber;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new InventoryItem entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
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
