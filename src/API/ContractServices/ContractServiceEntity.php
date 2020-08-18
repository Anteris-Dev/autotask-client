<?php

namespace Anteris\Autotask\API\ContractServices;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractService entities.
 */
class ContractServiceEntity extends DataTransferObject
{
    public int $contractID;
    public int $id;
    public ?float $internalCurrencyAdjustedPrice;
    public ?float $internalCurrencyUnitPrice;
    public ?string $internalDescription;
    public ?string $invoiceDescription;
    public ?int $quoteItemID;
    public int $serviceID;
    public ?float $unitCost;
    public ?float $unitPrice;
    public array $userDefinedFields = [];

    /**
     * Creates a new ContractService entity.
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
