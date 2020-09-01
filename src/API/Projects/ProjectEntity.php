<?php

namespace Anteris\Autotask\API\Projects;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Project entities.
 */
class ProjectEntity extends DataTransferObject
{
    public ?float $actualBilledHours;
    public ?float $actualHours;
    public ?float $changeOrdersBudget;
    public ?float $changeOrdersRevenue;
    public int $companyID;
    public ?int $companyOwnerResourceID;
    public ?Carbon $completedDateTime;
    public ?int $completedPercentage;
    public ?int $contractID;
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public ?int $department;
    public ?string $description;
    public ?int $duration;
    public Carbon $endDateTime;
    public ?float $estimatedSalesCost;
    public ?float $estimatedTime;
    public ?string $extProjectNumber;
    public ?int $extProjectType;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public ?float $laborEstimatedCosts;
    public ?float $laborEstimatedMarginPercentage;
    public ?float $laborEstimatedRevenue;
    public ?Carbon $lastActivityDateTime;
    public ?int $lastActivityPersonType;
    public ?int $lastActivityResourceID;
    public ?int $organizationalLevelAssociationID;
    public ?float $originalEstimatedRevenue;
    public ?float $projectCostEstimatedMarginPercentage;
    public ?float $projectCostsBudget;
    public ?float $projectCostsRevenue;
    public ?int $projectLeadResourceID;
    public string $projectName;
    public ?string $projectNumber;
    public int $projectType;
    public ?string $purchaseOrderNumber;
    public ?float $sgda;
    public Carbon $startDateTime;
    public int $status;
    public ?Carbon $statusDateTime;
    public ?string $statusDetail;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new Project entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['completedDateTime'])) {
            $array['completedDateTime'] = new Carbon($array['completedDateTime']);
        }

        if (isset($array['createDateTime'])) {
            $array['createDateTime'] = new Carbon($array['createDateTime']);
        }

        if (isset($array['endDateTime'])) {
            $array['endDateTime'] = new Carbon($array['endDateTime']);
        }

        if (isset($array['lastActivityDateTime'])) {
            $array['lastActivityDateTime'] = new Carbon($array['lastActivityDateTime']);
        }

        if (isset($array['startDateTime'])) {
            $array['startDateTime'] = new Carbon($array['startDateTime']);
        }

        if (isset($array['statusDateTime'])) {
            $array['statusDateTime'] = new Carbon($array['statusDateTime']);
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
