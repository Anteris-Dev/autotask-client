<?php

namespace Anteris\Autotask\API\DeletedTicketLogs;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents DeletedTicketLog entities.
 */
class DeletedTicketLogEntity extends DataTransferObject
{
    public int $deletedByResourceID;
    public Carbon $deletedDateTime;
    public $id;
    public int $ticketID;
    public string $ticketNumber;
    public string $ticketTitle;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new DeletedTicketLog entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['deletedDateTime'])) {
            $array['deletedDateTime'] = new Carbon($array['deletedDateTime']);
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
