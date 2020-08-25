<?php

namespace Anteris\Autotask\API\InventoryTransfers;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents InventoryTransfer entities.
 */
class InventoryTransferEntity extends DataTransferObject
{
    public int $fromLocationID;
    public int $id;
    public ?string $notes;
    public int $productID;
    public int $quantityTransferred;
    public ?string $serialNumber;
    public int $toLocationID;
    public ?int $transferByResourceID;
    public ?Carbon $transferDate;
    public ?string $updateNote;

    /**
     * Creates a new InventoryTransfer entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['transferDate'])) {
            $array['transferDate'] = new Carbon($array['transferDate']);
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
