<?php

namespace Anteris\Autotask\API\Tasks;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Task entities.
 */
class TaskEntity extends DataTransferObject
{
    public ?int $assignedResourceID;
    public ?int $assignedResourceRoleID;
    public ?int $billingCodeID;
    public ?bool $canClientPortalUserCompleteTask;
    public ?int $companyLocationID;
    public ?int $completedByResourceID;
    public ?int $completedByType;
    public ?Carbon $completedDateTime;
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public ?int $creatorType;
    public ?int $departmentID;
    public ?string $description;
    public ?Carbon $endDateTime;
    public ?float $estimatedHours;
    public ?string $externalID;
    public ?float $hoursToBeScheduled;
    public int $id;
    public ?bool $isTaskBillable;
    public ?bool $isVisibleInClientPortal;
    public ?Carbon $lastActivityDateTime;
    public ?int $lastActivityPersonType;
    public ?int $lastActivityResourceID;
    public ?int $phaseID;
    public ?int $priority;
    public ?int $priorityLabel;
    public int $projectID;
    public ?string $purchaseOrderNumber;
    public ?float $remainingHours;
    public ?Carbon $startDateTime;
    public int $status;
    public ?int $taskCategoryID;
    public ?string $taskNumber;
    public int $taskType;
    public string $title;
    public array $userDefinedFields = [];

    /**
     * Creates a new Task entity.
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
