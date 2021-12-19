<?php

namespace Anteris\Autotask\API\TimeOffRequests;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents TimeOffRequest entities.
 */
class TimeOffRequestEntity extends DataTransferObject
{
    public ?Carbon $approvedDateTime;
    public ?int $approveRejectResourceID;
    public ?Carbon $createDateTime;
    public ?int $createdByResourceID;
    public ?Carbon $endTime;
    public float $hours;
    public $id;
    public ?int $lastModifiedByResourceID;
    public ?Carbon $lastModifiedDateTime;
    public ?string $reason;
    public ?string $rejectReason;
    public Carbon $requestDate;
    public int $resourceID;
    public ?Carbon $startTime;
    public int $status;
    public int $timeOffRequestType;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new TimeOffRequest entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['approvedDateTime'])) {
            $array['approvedDateTime'] = new Carbon($array['approvedDateTime']);
        }

        if (isset($array['createDateTime'])) {
            $array['createDateTime'] = new Carbon($array['createDateTime']);
        }

        if (isset($array['endTime'])) {
            $array['endTime'] = new Carbon($array['endTime']);
        }

        if (isset($array['lastModifiedDateTime'])) {
            $array['lastModifiedDateTime'] = new Carbon($array['lastModifiedDateTime']);
        }

        if (isset($array['requestDate'])) {
            $array['requestDate'] = new Carbon($array['requestDate']);
        }

        if (isset($array['startTime'])) {
            $array['startTime'] = new Carbon($array['startTime']);
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
