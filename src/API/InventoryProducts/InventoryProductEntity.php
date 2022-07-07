<?php

namespace Anteris\Autotask\API\InventoryProducts;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents InventoryProduct entities.
 */
class InventoryProductEntity extends DataTransferObject
{
    public int $availableUnits;
    public ?int $backOrderQuantity;
    public ?string $bin;
    public ?Carbon $createDateTime;
    public ?int $createdByResourceID;
    public $id;
    public int $inventoryLocationID;
    public ?int $onHandUnits;
    public ?int $pickedUnits;
    public int $productID;
    public int $quantityMaximum;
    public int $quantityMinimum;
    public ?string $referenceNumber;
    public ?int $reservedUnits;
    public ?int $unitsOnOrder;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new InventoryProduct entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDateTime'])) {
            $array['createDateTime'] = new Carbon($array['createDateTime']);
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
