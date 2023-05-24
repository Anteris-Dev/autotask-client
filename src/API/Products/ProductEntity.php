<?php

namespace Anteris\Autotask\API\Products;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Product entities.
 */
class ProductEntity extends DataTransferObject
{
    public ?int $billingType;
    public ?int $chargeBillingCodeID;
    public ?int $createdByResourceID;
    public ?Carbon $createdTime;
    public ?int $defaultInstalledProductCategoryID;
    public ?int $defaultVendorID;
    public ?string $description;
    public ?bool $doesNotRequireProcurement;
    public ?string $externalProductID;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public ?string $internalProductID;
    public bool $isActive;
    public ?bool $isEligibleForRma;
    public bool $isSerialized;
    public ?string $link;
    public ?string $manufacturerName;
    public ?string $manufacturerProductName;
    public ?float $markupRate;
    public ?float $msrp;
    public string $name;
    public ?int $periodType;
    public ?int $priceCostMethod;
    public int $productBillingCodeID;
    public ?int $productCategory;
    public ?string $sku;
    public ?float $unitCost;
    public ?float $unitPrice;
    public ?string $vendorProductNumber;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new Product entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createdTime'])) {
            $array['createdTime'] = new Carbon($array['createdTime']);
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
