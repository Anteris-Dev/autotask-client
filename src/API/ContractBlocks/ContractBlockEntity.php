<?php

namespace Anteris\Autotask\API\ContractBlocks;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractBlock entities.
 */
class ContractBlockEntity extends DataTransferObject
{
    public int $contractID;
    public Carbon $datePurchased;
    public Carbon $endDate;
    public float $hourlyRate;
    public float $hours;
    public ?float $hoursApproved;
    public int $id;
    public ?string $invoiceNumber;
    public ?bool $isPaid;
    public ?string $paymentNumber;
    public ?int $paymentType;
    public Carbon $startDate;
    public ?int $status;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['datePurchased'] = new Carbon($array['datePurchased']);
        $array['endDate'] = new Carbon($array['endDate']);
        $array['startDate'] = new Carbon($array['startDate']);
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
