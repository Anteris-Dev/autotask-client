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
    public int $id;
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
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['approvalStatusChangedDate'] = new Carbon($array['approvalStatusChangedDate']);
        $array['createDate'] = new Carbon($array['createDate']);
        $array['effectiveDate'] = new Carbon($array['effectiveDate']);
        $array['expirationDate'] = new Carbon($array['expirationDate']);
        $array['extApprovalResponseDate'] = new Carbon($array['extApprovalResponseDate']);
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
