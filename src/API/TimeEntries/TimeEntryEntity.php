<?php

namespace Anteris\Autotask\API\TimeEntries;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents TimeEntry entities.
 */
class TimeEntryEntity extends DataTransferObject
{
    public ?Carbon $billingApprovalDateTime;
    public ?int $billingApprovalLevelMostRecent;
    public ?int $billingApprovalResourceID;
    public ?int $billingCodeID;
    public ?int $contractID;
    public ?int $contractServiceBundleID;
    public ?int $contractServiceID;
    public ?Carbon $createDateTime;
    public ?int $creatorUserID;
    public Carbon $dateWorked;
    public ?Carbon $endDateTime;
    public ?float $hoursToBill;
    public ?float $hoursWorked;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?int $impersonatorUpdaterResourceID;
    public ?int $internalBillingCodeID;
    public ?string $internalNotes;
    public ?bool $isNonBillable;
    public ?Carbon $lastModifiedDateTime;
    public ?int $lastModifiedUserID;
    public ?float $offsetHours;
    public int $resourceID;
    public ?int $roleID;
    public ?bool $showOnInvoice;
    public ?Carbon $startDateTime;
    public ?string $summaryNotes;
    public ?int $taskID;
    public ?int $ticketID;
    public ?int $timeEntryType;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['billingApprovalDateTime'] = new Carbon($array['billingApprovalDateTime']);
        $array['createDateTime'] = new Carbon($array['createDateTime']);
        $array['dateWorked'] = new Carbon($array['dateWorked']);
        $array['endDateTime'] = new Carbon($array['endDateTime']);
        $array['lastModifiedDateTime'] = new Carbon($array['lastModifiedDateTime']);
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
