<?php

namespace Anteris\Autotask\API\ContractMilestones;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractMilestone entities.
 */
class ContractMilestoneEntity extends DataTransferObject
{
    public float $amount;
    public ?int $billingCodeID;
    public int $contractID;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public Carbon $dateDue;
    public ?string $description;
    public int $id;
    public ?float $internalCurrencyAmount;
    public bool $isInitialPayment;
    public ?int $organizationalLevelAssociationID;
    public int $status;
    public string $title;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDate'] = new Carbon($array['createDate']);
        $array['dateDue'] = new Carbon($array['dateDue']);
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
