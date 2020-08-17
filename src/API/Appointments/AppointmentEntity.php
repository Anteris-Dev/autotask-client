<?php

namespace Anteris\Autotask\API\Appointments;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Appointment entities.
 */
class AppointmentEntity extends DataTransferObject
{
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public ?string $description;
    public Carbon $endDateTime;
    public int $id;
    public int $resourceID;
    public Carbon $startDateTime;
    public string $title;
    public ?Carbon $updateDateTime;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDateTime'] = new Carbon($array['createDateTime']);
        $array['endDateTime'] = new Carbon($array['endDateTime']);
        $array['startDateTime'] = new Carbon($array['startDateTime']);
        $array['updateDateTime'] = new Carbon($array['updateDateTime']);
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
