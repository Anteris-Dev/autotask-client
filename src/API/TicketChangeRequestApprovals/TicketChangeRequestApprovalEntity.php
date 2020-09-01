<?php

namespace Anteris\Autotask\API\TicketChangeRequestApprovals;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents TicketChangeRequestApproval entities.
 */
class TicketChangeRequestApprovalEntity extends DataTransferObject
{
    public ?Carbon $approveRejectDateTime;
    public ?string $approveRejectNote;
    public ?int $contactID;
    public int $id;
    public ?bool $isApproved;
    public ?int $resourceID;
    public int $ticketID;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new TicketChangeRequestApproval entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['approveRejectDateTime'])) {
            $array['approveRejectDateTime'] = new Carbon($array['approveRejectDateTime']);
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
