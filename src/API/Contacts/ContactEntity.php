<?php

namespace Anteris\Autotask\API\Contacts;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Contact entities.
 */
class ContactEntity extends DataTransferObject
{
    public ?string $additionalAddressInformation;
    public ?string $addressLine;
    public ?string $addressLine1;
    public ?string $alternatePhone;
    public ?int $apiVendorID;
    public ?Carbon $bulkEmailOptOutTime;
    public ?string $city;
    public int $companyID;
    public ?int $companyLocationID;
    public ?int $countryID;
    public ?Carbon $createDate;
    public ?string $emailAddress;
    public ?string $emailAddress2;
    public ?string $emailAddress3;
    public ?string $extension;
    public ?string $externalID;
    public ?string $facebookUrl;
    public ?string $faxNumber;
    public string $firstName;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public int $isActive;
    public ?bool $isOptedOutFromBulkEmail;
    public ?Carbon $lastActivityDate;
    public ?Carbon $lastModifiedDate;
    public string $lastName;
    public ?string $linkedInUrl;
    public ?string $middleInitial;
    public ?string $mobilePhone;
    public ?int $namePrefix;
    public ?int $nameSuffix;
    public ?string $note;
    public ?string $phone;
    public ?bool $primaryContact;
    public ?bool $receivesEmailNotifications;
    public ?string $roomNumber;
    public ?bool $solicitationOptOut;
    public ?Carbon $solicitationOptOutTime;
    public ?string $state;
    public ?bool $surveyOptOut;
    public ?string $title;
    public ?string $twitterUrl;
    public ?string $zipCode;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['bulkEmailOptOutTime'] = new Carbon($array['bulkEmailOptOutTime']);
        $array['createDate'] = new Carbon($array['createDate']);
        $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
        $array['lastModifiedDate'] = new Carbon($array['lastModifiedDate']);
        $array['solicitationOptOutTime'] = new Carbon($array['solicitationOptOutTime']);
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
