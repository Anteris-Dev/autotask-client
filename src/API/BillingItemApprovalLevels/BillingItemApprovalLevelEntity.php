<?php

namespace Anteris\Autotask\API\BillingItemApprovalLevels;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents BillingItemApprovalLevel entities.
 */
class BillingItemApprovalLevelEntity extends DataTransferObject
{
    public Carbon $approvalDateTime;
    public int $approvalLevel;
    public int $approvalResourceID;
    public int $id;
    public int $timeEntryID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['approvalDateTime'] = new Carbon($array['approvalDateTime']);
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
