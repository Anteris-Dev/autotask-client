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
    public $companyID;
    public ?string $entityNumber;
    public ?string $entityTitle;
    public $id;
    public $initiatingContactID;
    public $initiatingResourceID;
    public bool $isActive;
    public bool $isDeleted;
    public bool $isTemplateJob;
    public ?int $notificationHistoryTypeID;
    public ?Carbon $notificationSentTime;
    public $opportunityID;
    public $projectID;
    public $quoteID;
    public ?string $recipientDisplayName;
    public ?string $recipientEmailAddress;
    public $taskID;
    public ?string $templateName;
    public $ticketID;
    public $timeEntryID;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new NotificationHistory entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['notificationSentTime'])) {
            $array['notificationSentTime'] = new Carbon($array['notificationSentTime']);
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
