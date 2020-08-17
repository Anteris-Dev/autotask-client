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

    public function __construct(array $array)
    {
        $array['createDate'] = new Carbon($array['createDate']);
        $array['dueDate'] = new Carbon($array['dueDate']);
        $array['lastActivityDateTime'] = new Carbon($array['lastActivityDateTime']);
        $array['startDate'] = new Carbon($array['startDate']);
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
