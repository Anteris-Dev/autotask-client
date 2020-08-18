<?php

namespace Anteris\Autotask\API\ServiceCalls;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ServiceCall entities.
 */
class ServiceCallEntity extends DataTransferObject
{
    public ?float $cancelationNoticeHours;
    public ?int $canceledByResourceID;
    public ?Carbon $canceledDateTime;
    public int $companyID;
    public ?int $companyLocationID;
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public ?string $description;
    public ?float $duration;
    public Carbon $endDateTime;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?int $isComplete;
    public ?Carbon $lastModifiedDateTime;
    public Carbon $startDateTime;
    public ?int $status;
    public array $userDefinedFields = [];

    /**
     * Creates a new ServiceCall entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['canceledDateTime'])) {
            $array['canceledDateTime'] = new Carbon($array['canceledDateTime']);
        }

        if (isset($array['createDateTime'])) {
            $array['createDateTime'] = new Carbon($array['createDateTime']);
        }

        if (isset($array['endDateTime'])) {
            $array['endDateTime'] = new Carbon($array['endDateTime']);
        }

        if (isset($array['lastModifiedDateTime'])) {
            $array['lastModifiedDateTime'] = new Carbon($array['lastModifiedDateTime']);
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
