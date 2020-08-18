<?php

namespace Anteris\Autotask\API\Contracts;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Contract entities.
 */
class ContractEntity extends DataTransferObject
{
    public ?int $billingPreference;
    public ?int $billToCompanyContactID;
    public ?int $billToCompanyID;
    public int $companyID;
    public ?int $contactID;
    public ?string $contactName;
    public ?int $contractCategory;
    public ?int $contractExclusionSetID;
    public string $contractName;
    public ?string $contractNumber;
    public ?int $contractPeriodType;
    public int $contractType;
    public ?string $description;
    public Carbon $endDate;
    public ?float $estimatedCost;
    public ?float $estimatedHours;
    public ?float $estimatedRevenue;
    public ?int $exclusionContractID;
    public int $id;
    public ?float $internalCurrencyOverageBillingRate;
    public ?float $internalCurrencySetupFee;
    public ?bool $isCompliant;
    public ?bool $isDefaultContract;
    public ?int $opportunityID;
    public ?int $organizationalLevelAssociationID;
    public ?float $overageBillingRate;
    public ?string $purchaseOrderNumber;
    public ?int $renewedContractID;
    public ?int $serviceLevelAgreementID;
    public ?float $setupFee;
    public ?int $setupFeeBillingCodeID;
    public Carbon $startDate;
    public int $status;
    public int $timeReportingRequiresStartAndStopTimes;
    public array $userDefinedFields = [];

    /**
     * Creates a new Contract entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
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
