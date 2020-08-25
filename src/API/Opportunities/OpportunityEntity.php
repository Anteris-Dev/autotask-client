<?php

namespace Anteris\Autotask\API\Opportunities;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Opportunity entities.
 */
class OpportunityEntity extends DataTransferObject
{
    public ?float $advancedField1;
    public ?float $advancedField2;
    public ?float $advancedField3;
    public ?float $advancedField4;
    public ?float $advancedField5;
    public float $amount;
    public ?float $assessmentScore;
    public ?string $barriers;
    public ?Carbon $closedDate;
    public int $companyID;
    public ?int $contactID;
    public float $cost;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public ?string $description;
    public ?string $helpNeeded;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?Carbon $lastActivity;
    public ?int $leadSource;
    public ?int $lossReason;
    public ?string $lossReasonDetail;
    public ?Carbon $lostDate;
    public ?string $market;
    public ?float $monthlyCost;
    public ?float $monthlyRevenue;
    public ?string $nextStep;
    public ?float $onetimeCost;
    public ?float $onetimeRevenue;
    public ?int $opportunityCategoryID;
    public ?int $organizationalLevelAssociationID;
    public int $ownerResourceID;
    public ?int $primaryCompetitor;
    public int $probability;
    public ?int $productID;
    public Carbon $projectedCloseDate;
    public ?Carbon $promisedFulfillmentDate;
    public ?string $promotionName;
    public ?float $quarterlyCost;
    public ?float $quarterlyRevenue;
    public ?int $rating;
    public ?float $relationshipAssessmentScore;
    public ?int $revenueSpread;
    public ?string $revenueSpreadUnit;
    public ?int $salesOrderID;
    public ?int $salesProcessPercentComplete;
    public ?float $semiannualCost;
    public ?float $semiannualRevenue;
    public int $stage;
    public Carbon $startDate;
    public int $status;
    public ?float $technicalAssessmentScore;
    public ?Carbon $throughDate;
    public string $title;
    public ?int $totalAmountMonths;
    public bool $useQuoteTotals;
    public ?int $winReason;
    public ?string $winReasonDetail;
    public ?float $yearlyCost;
    public ?float $yearlyRevenue;

    /**
     * Creates a new Opportunity entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['closedDate'])) {
            $array['closedDate'] = new Carbon($array['closedDate']);
        }

        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['lastActivity'])) {
            $array['lastActivity'] = new Carbon($array['lastActivity']);
        }

        if (isset($array['lostDate'])) {
            $array['lostDate'] = new Carbon($array['lostDate']);
        }

        if (isset($array['projectedCloseDate'])) {
            $array['projectedCloseDate'] = new Carbon($array['projectedCloseDate']);
        }

        if (isset($array['promisedFulfillmentDate'])) {
            $array['promisedFulfillmentDate'] = new Carbon($array['promisedFulfillmentDate']);
        }

        if (isset($array['startDate'])) {
            $array['startDate'] = new Carbon($array['startDate']);
        }

        if (isset($array['throughDate'])) {
            $array['throughDate'] = new Carbon($array['throughDate']);
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
