<?php

namespace Anteris\Autotask\API\NotificationHistory;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents NotificationHistory entities.
 */
class NotificationHistoryEntity extends DataTransferObject
{
    public ?int $companyID;
    public ?string $entityNumber;
    public ?string $entityTitle;
    public int $id;
    public ?int $initiatingContactID;
    public ?int $initiatingResourceID;
    public bool $isActive;
    public bool $isDeleted;
    public bool $isTemplateJob;
    public ?int $notificationHistoryTypeID;
    public ?Carbon $notificationSentTime;
    public ?int $opportunityID;
    public ?int $projectID;
    public ?int $quoteID;
    public ?string $recipientDisplayName;
    public ?string $recipientEmailAddress;
    public ?int $taskID;
    public ?string $templateName;
    public ?int $ticketID;
    public ?int $timeEntryID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['notificationSentTime'] = new Carbon($array['notificationSentTime']);
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
