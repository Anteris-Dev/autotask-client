<?php

namespace Anteris\Autotask\API\DeletedTaskActivityLogs;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents DeletedTaskActivityLog entities.
 */
class DeletedTaskActivityLogEntity extends DataTransferObject
{
    public Carbon $activityDateTime;
    public int $createdByResourceID;
    public int $deletedByResourceID;
    public Carbon $deletedDateTime;
    public Carbon $endDateTime;
    public float $hoursWorked;
    public $id;
    public string $noteOrAttachmentTitle;
    public Carbon $startDateTime;
    public int $taskID;
    public string $taskNumber;
    public int $typeID;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new DeletedTaskActivityLog entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['activityDateTime'])) {
            $array['activityDateTime'] = new Carbon($array['activityDateTime']);
        }

        if (isset($array['deletedDateTime'])) {
            $array['deletedDateTime'] = new Carbon($array['deletedDateTime']);
        }

        if (isset($array['endDateTime'])) {
            $array['endDateTime'] = new Carbon($array['endDateTime']);
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
