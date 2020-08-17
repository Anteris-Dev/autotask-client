<?php

namespace Anteris\Autotask\API\Tickets;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Ticket entities.
 */
class TicketEntity extends DataTransferObject
{
    public ?int $apiVendorID;
    public ?int $assignedResourceID;
    public ?int $assignedResourceRoleID;
    public ?int $billingCodeID;
    public ?int $changeApprovalBoard;
    public ?int $changeApprovalStatus;
    public ?int $changeApprovalType;
    public ?string $changeInfoField1;
    public ?string $changeInfoField2;
    public ?string $changeInfoField3;
    public ?string $changeInfoField4;
    public ?string $changeInfoField5;
    public int $companyID;
    public ?int $companyLocationID;
    public ?int $completedByResourceID;
    public ?Carbon $completedDate;
    public ?int $configurationItemID;
    public ?int $contactID;
    public ?int $contractID;
    public ?int $contractServiceBundleID;
    public ?int $contractServiceID;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public ?int $creatorType;
    public ?int $currentServiceThermometerRating;
    public ?string $description;
    public ?Carbon $dueDateTime;
    public ?float $estimatedHours;
    public ?string $externalID;
    public ?int $firstResponseAssignedResourceID;
    public ?Carbon $firstResponseDateTime;
    public ?Carbon $firstResponseDueDateTime;
    public ?int $firstResponseInitiatingResourceID;
    public ?float $hoursToBeScheduled;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?int $issueType;
    public ?Carbon $lastActivityDate;
    public ?int $lastActivityPersonType;
    public ?int $lastActivityResourceID;
    public ?Carbon $lastCustomerNotificationDateTime;
    public ?Carbon $lastCustomerVisibleActivityDateTime;
    public ?Carbon $lastTrackedModificationDateTime;
    public ?int $monitorID;
    public ?int $monitorTypeID;
    public ?int $opportunityID;
    public ?int $organizationalLevelAssociationID;
    public ?int $previousServiceThermometerRating;
    public int $priority;
    public ?int $problemTicketId;
    public ?int $projectID;
    public ?string $purchaseOrderNumber;
    public ?int $queueID;
    public ?string $resolution;
    public ?Carbon $resolutionPlanDateTime;
    public ?Carbon $resolutionPlanDueDateTime;
    public ?Carbon $resolvedDateTime;
    public ?Carbon $resolvedDueDateTime;
    public ?int $rmaStatus;
    public ?int $rmaType;
    public ?string $rmmAlertID;
    public ?bool $serviceLevelAgreementHasBeenMet;
    public ?int $serviceLevelAgreementID;
    public ?float $serviceLevelAgreementPausedNextEventHours;
    public ?int $serviceThermometerTemperature;
    public ?int $source;
    public int $status;
    public ?int $subIssueType;
    public ?int $ticketCategory;
    public ?string $ticketNumber;
    public ?int $ticketType;
    public string $title;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['completedDate'] = new Carbon($array['completedDate']);
        $array['createDate'] = new Carbon($array['createDate']);
        $array['dueDateTime'] = new Carbon($array['dueDateTime']);
        $array['firstResponseDateTime'] = new Carbon($array['firstResponseDateTime']);
        $array['firstResponseDueDateTime'] = new Carbon($array['firstResponseDueDateTime']);
        $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
        $array['lastCustomerNotificationDateTime'] = new Carbon($array['lastCustomerNotificationDateTime']);
        $array['lastCustomerVisibleActivityDateTime'] = new Carbon($array['lastCustomerVisibleActivityDateTime']);
        $array['lastTrackedModificationDateTime'] = new Carbon($array['lastTrackedModificationDateTime']);
        $array['resolutionPlanDateTime'] = new Carbon($array['resolutionPlanDateTime']);
        $array['resolutionPlanDueDateTime'] = new Carbon($array['resolutionPlanDueDateTime']);
        $array['resolvedDateTime'] = new Carbon($array['resolvedDateTime']);
        $array['resolvedDueDateTime'] = new Carbon($array['resolvedDueDateTime']);
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
