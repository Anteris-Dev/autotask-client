<?php

namespace Anteris\Autotask\API\ProductVendors;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ProductVendor entities.
 */
class ProductVendorEntity extends DataTransferObject
{
    public int $id;
    public bool $isActive;
    public bool $isDefault;
    public int $productID;
    public ?float $vendorCost;
    public int $vendorID;
    public ?string $vendorPartNumber;
    public array $userDefinedFields = [];

    /**
     * Creates a new ProductVendor entity.
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
