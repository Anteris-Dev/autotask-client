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

    /**
     * Creates a new Ticket entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['completedDate'])) {
            $array['completedDate'] = new Carbon($array['completedDate']);
        }

        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['dueDateTime'])) {
            $array['dueDateTime'] = new Carbon($array['dueDateTime']);
        }

        if (isset($array['firstResponseDateTime'])) {
            $array['firstResponseDateTime'] = new Carbon($array['firstResponseDateTime']);
        }

        if (isset($array['firstResponseDueDateTime'])) {
            $array['firstResponseDueDateTime'] = new Carbon($array['firstResponseDueDateTime']);
        }

        if (isset($array['lastActivityDate'])) {
            $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
        }

        if (isset($array['lastCustomerNotificationDateTime'])) {
            $array['lastCustomerNotificationDateTime'] = new Carbon($array['lastCustomerNotificationDateTime']);
        }

        if (isset($array['lastCustomerVisibleActivityDateTime'])) {
            $array['lastCustomerVisibleActivityDateTime'] = new Carbon($array['lastCustomerVisibleActivityDateTime']);
        }

        if (isset($array['lastTrackedModificationDateTime'])) {
            $array['lastTrackedModificationDateTime'] = new Carbon($array['lastTrackedModificationDateTime']);
        }

        if (isset($array['resolutionPlanDateTime'])) {
            $array['resolutionPlanDateTime'] = new Carbon($array['resolutionPlanDateTime']);
        }

        if (isset($array['resolutionPlanDueDateTime'])) {
            $array['resolutionPlanDueDateTime'] = new Carbon($array['resolutionPlanDueDateTime']);
        }

        if (isset($array['resolvedDateTime'])) {
            $array['resolvedDateTime'] = new Carbon($array['resolvedDateTime']);
        }

        if (isset($array['resolvedDueDateTime'])) {
            $array['resolvedDueDateTime'] = new Carbon($array['resolvedDueDateTime']);
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
