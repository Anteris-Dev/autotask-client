<?php

namespace Anteris\Autotask\API\QuoteItems;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents QuoteItem entities.
 */
class QuoteItemEntity extends DataTransferObject
{
    public ?float $averageCost;
    public ?int $chargeID;
    public ?string $description;
    public ?int $expenseID;
    public ?float $highestCost;
    public int $id;
    public ?float $internalCurrencyLineDiscount;
    public ?float $internalCurrencyUnitDiscount;
    public ?float $internalCurrencyUnitPrice;
    public bool $isOptional;
    public ?bool $isTaxable;
    public ?int $laborID;
    public float $lineDiscount;
    public ?float $markupRate;
    public ?string $name;
    public float $percentageDiscount;
    public ?int $periodType;
    public ?int $productID;
    public float $quantity;
    public int $quoteID;
    public int $quoteItemType;
    public ?int $serviceBundleID;
    public ?int $serviceID;
    public ?int $shippingID;
    public ?int $taxCategoryID;
    public ?float $totalEffectiveTax;
    public ?float $unitCost;
    public float $unitDiscount;
    public ?float $unitPrice;

    /**
     * Creates a new QuoteItem entity.
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
