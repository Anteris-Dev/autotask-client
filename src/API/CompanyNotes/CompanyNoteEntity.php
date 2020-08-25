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

    /**
     * Creates a new CompanyNote entity.
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

        if (isset($array['lastModifiedDate'])) {
            $array['lastModifiedDate'] = new Carbon($array['lastModifiedDate']);
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
