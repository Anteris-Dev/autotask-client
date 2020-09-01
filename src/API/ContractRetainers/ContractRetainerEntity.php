<?php

namespace Anteris\Autotask\API\ContractRetainers;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractRetainer entities.
 */
class ContractRetainerEntity extends DataTransferObject
{
    public float $amount;
    public ?float $amountApproved;
    public int $contractID;
    public Carbon $datePurchased;
    public Carbon $endDate;
    public int $id;
    public ?float $internalCurrencyAmount;
    public ?float $internalCurrencyAmountApproved;
    public ?string $invoiceNumber;
    public ?bool $isPaid;
    public ?int $paymentID;
    public ?string $paymentNumber;
    public Carbon $startDate;
    public int $status;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new ContractRetainer entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['datePurchased'])) {
            $array['datePurchased'] = new Carbon($array['datePurchased']);
        }

        if (isset($array['endDate'])) {
            $array['endDate'] = new Carbon($array['endDate']);
        }

        if (isset($array['startDate'])) {
            $array['startDate'] = new Carbon($array['startDate']);
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
