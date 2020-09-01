<?php

namespace Anteris\Autotask\API\TicketCategoryFieldDefaults;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents TicketCategoryFieldDefault entities.
 */
class TicketCategoryFieldDefaultEntity extends DataTransferObject
{
    public ?string $description;
    public ?float $estimatedHours;
    public $id;
    public ?int $issueTypeID;
    public ?int $organizationalLevelAssociationID;
    public ?int $priority;
    public ?string $purchaseOrderNumber;
    public ?int $queueID;
    public ?string $resolution;
    public ?int $serviceLevelAgreementID;
    public ?int $sourceID;
    public ?int $status;
    public ?int $subIssueTypeID;
    public int $ticketCategoryID;
    public ?int $ticketTypeID;
    public ?string $title;
    public ?int $workTypeID;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new TicketCategoryFieldDefault entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
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
