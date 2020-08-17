<?php

namespace Anteris\Autotask\API\TicketChecklistItems;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents TicketChecklistItem entities.
 */
class TicketChecklistItemEntity extends DataTransferObject
{
    public ?int $completedByResourceID;
    public ?Carbon $completedDateTime;
    public int $id;
    public ?bool $isCompleted;
    public ?bool $isImportant;
    public string $itemName;
    public ?int $knowledgebaseArticleID;
    public ?int $position;
    public int $ticketID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['completedDateTime'] = new Carbon($array['completedDateTime']);
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
