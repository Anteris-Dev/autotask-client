<?php

namespace Anteris\Autotask\API\Companies;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Company entities.
 */
class CompanyEntity extends DataTransferObject
{
    public ?string $additionalAddressInformation;
    public ?string $address1;
    public ?string $address2;
    public ?string $alternatePhone1;
    public ?string $alternatePhone2;
    public ?int $apiVendorID;
    public ?float $assetValue;
    public ?string $billingAddress1;
    public ?string $billingAddress2;
    public ?string $billToAdditionalAddressInformation;
    public ?int $billToAddressToUse;
    public ?string $billToAttention;
    public ?string $billToCity;
    public ?int $billToCompanyLocationID;
    public ?int $billToCountryID;
    public ?string $billToState;
    public ?string $billToZipCode;
    public ?string $city;
    public ?int $classification;
    public string $companyName;
    public ?string $companyNumber;
    public $companyType;
    public ?int $competitorID;
    public ?int $countryID;
    public ?Carbon $createDate;
    public ?int $createdByResourceID;
    public ?int $currencyID;
    public ?string $fax;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public ?int $invoiceEmailMessageID;
    public ?int $invoiceMethod;
    public ?bool $invoiceNonContractItemsToParentCompany;
    public ?int $invoiceTemplateID;
    public ?bool $isActive;
    public ?bool $isClientPortalActive;
    public ?bool $isEnabledForComanaged;
    public ?bool $isTaskFireActive;
    public ?bool $isTaxExempt;
    public ?Carbon $lastActivityDate;
    public ?Carbon $lastTrackedModifiedDateTime;
    public ?int $marketSegmentID;
    public int $ownerResourceID;
    public ?int $parentCompanyID;
    public string $phone;
    public ?string $postalCode;
    public ?int $quoteEmailMessageID;
    public ?int $purchaseOrderTemplateID;
    public ?int $quoteTemplateID;
    public ?string $sicCode;
    public ?string $state;
    public ?string $stockMarket;
    public ?string $stockSymbol;
    public ?float $surveyCompanyRating;
    public ?string $taxID;
    public ?int $taxRegionID;
    public ?int $territoryID;
    public ?string $webAddress;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new Company entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['lastActivityDate'])) {
            $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
        }

        if (isset($array['lastTrackedModifiedDateTime'])) {
            $array['lastTrackedModifiedDateTime'] = new Carbon($array['lastTrackedModifiedDateTime']);
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
