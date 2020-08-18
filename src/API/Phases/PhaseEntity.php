<?php

namespace Anteris\Autotask\API\Phases;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Phase entities.
 */
class PhaseEntity extends DataTransferObject
{
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public ?string $description;
    public ?Carbon $dueDate;
    public ?float $estimatedHours;
    public ?string $externalID;
    public int $id;
    public ?bool $isScheduled;
    public ?Carbon $lastActivityDateTime;
    public ?int $parentPhaseID;
    public ?string $phaseNumber;
    public int $projectID;
    public ?Carbon $startDate;
    public string $title;
    public array $userDefinedFields = [];

    /**
     * Creates a new Phase entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['dueDate'])) {
            $array['dueDate'] = new Carbon($array['dueDate']);
        }

        if (isset($array['lastActivityDateTime'])) {
            $array['lastActivityDateTime'] = new Carbon($array['lastActivityDateTime']);
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
