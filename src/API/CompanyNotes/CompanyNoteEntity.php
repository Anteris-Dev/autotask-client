<?php

namespace Anteris\Autotask\API\CompanyNotes;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents CompanyNote entities.
 */
class CompanyNoteEntity extends DataTransferObject
{
    public int $actionType;
    public int $assignedResourceID;
    public int $companyID;
    public ?Carbon $completedDateTime;
    public ?int $contactID;
    public ?Carbon $createDateTime;
    public Carbon $endDateTime;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?int $impersonatorUpdaterResourceID;
    public ?Carbon $lastModifiedDate;
    public ?string $name;
    public ?string $note;
    public ?int $opportunityID;
    public Carbon $startDateTime;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['completedDateTime'] = new Carbon($array['completedDateTime']);
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
