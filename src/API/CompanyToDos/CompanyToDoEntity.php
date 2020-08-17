<?php

namespace Anteris\Autotask\API\CompanyToDos;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents CompanyToDo entities.
 */
class CompanyToDoEntity extends DataTransferObject
{
    public int $actionType;
    public ?string $activityDescription;
    public int $assignedToResourceID;
    public int $companyID;
    public ?Carbon $completedDate;
    public ?int $contactID;
    public ?int $contractID;
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public Carbon $endDateTime;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?Carbon $lastModifiedDate;
    public ?int $opportunityID;
    public Carbon $startDateTime;
    public ?int $ticketID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['completedDate'] = new Carbon($array['completedDate']);
        $array['createDateTime'] = new Carbon($array['createDateTime']);
        $array['endDateTime'] = new Carbon($array['endDateTime']);
        $array['lastModifiedDate'] = new Carbon($array['lastModifiedDate']);
        $array['startDateTime'] = new Carbon($array['startDateTime']);
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
