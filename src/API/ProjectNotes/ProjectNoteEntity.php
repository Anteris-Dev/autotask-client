<?php

namespace Anteris\Autotask\API\ProjectNotes;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ProjectNote entities.
 */
class ProjectNoteEntity extends DataTransferObject
{
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public string $description;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?int $impersonatorUpdaterResourceID;
    public bool $isAnnouncement;
    public ?Carbon $lastActivityDate;
    public int $noteType;
    public int $projectID;
    public int $publish;
    public string $title;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDateTime'] = new Carbon($array['createDateTime']);
        $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
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
