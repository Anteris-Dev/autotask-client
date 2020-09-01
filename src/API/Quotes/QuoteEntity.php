<?php

namespace Anteris\Autotask\API\Quotes;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Quote entities.
 */
class QuoteEntity extends DataTransferObject
{
    public ?int $approvalStatus;
    public ?int $approvalStatusChangedByResourceID;
    public ?Carbon $approvalStatusChangedDate;
    public int $billToLocationID;
    public ?bool $calculateTaxSeparately;
    public ?string $comment;
    public ?int $companyID;
    public ?int $contactID;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public ?string $description;
    public Carbon $effectiveDate;
    public Carbon $expirationDate;
    public ?int $extApprovalContactResponse;
    public ?Carbon $extApprovalResponseDate;
    public ?string $extApprovalResponseSignature;
    public ?string $externalQuoteNumber;
    public ?int $groupByID;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public ?bool $isActive;
    public ?Carbon $lastActivityDate;
    public ?int $lastModifiedBy;
    public string $name;
    public int $opportunityID;
    public ?int $paymentTerm;
    public ?int $paymentType;
    public ?bool $primaryQuote;
    public ?int $proposalProjectID;
    public ?string $purchaseOrderNumber;
    public ?int $quoteNumber;
    public ?int $quoteTemplateID;
    public ?int $shippingType;
    public int $shipToLocationID;
    public ?bool $showEachTaxInGroup;
    public ?bool $showTaxCategory;
    public int $soldToLocationID;
    public ?int $taxRegionID;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new Quote entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['approvalStatusChangedDate'])) {
            $array['approvalStatusChangedDate'] = new Carbon($array['approvalStatusChangedDate']);
        }

        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['effectiveDate'])) {
            $array['effectiveDate'] = new Carbon($array['effectiveDate']);
        }

        if (isset($array['expirationDate'])) {
            $array['expirationDate'] = new Carbon($array['expirationDate']);
        }

        if (isset($array['extApprovalResponseDate'])) {
            $array['extApprovalResponseDate'] = new Carbon($array['extApprovalResponseDate']);
        }

        if (isset($array['lastActivityDate'])) {
            $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
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
