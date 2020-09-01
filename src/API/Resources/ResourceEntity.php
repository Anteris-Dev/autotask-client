<?php

namespace Anteris\Autotask\API\Resources;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Resource entities.
 */
class ResourceEntity extends DataTransferObject
{
    public ?string $accountingReferenceID;
    public ?string $dateFormat;
    public $defaultServiceDeskRoleID;
    public string $email;
    public ?string $email2;
    public ?string $email3;
    public string $emailTypeCode;
    public ?string $emailTypeCode2;
    public ?string $emailTypeCode3;
    public string $firstName;
    public ?string $gender;
    public ?int $greeting;
    public Carbon $hireDate;
    public ?string $homePhone;
    public $id;
    public ?string $initials;
    public ?float $internalCost;
    public bool $isActive;
    public string $lastName;
    public int $licenseType;
    public int $locationID;
    public ?string $middleName;
    public ?string $mobilePhone;
    public string $numberFormat;
    public ?string $officeExtension;
    public ?string $officePhone;
    public int $payrollType;
    public string $resourceType;
    public ?int $suffix;
    public ?float $surveyResourceRating;
    public ?string $timeFormat;
    public ?string $title;
    public ?string $travelAvailabilityPct;
    public string $userName;
    public int $userType;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new Resource entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['hireDate'])) {
            $array['hireDate'] = new Carbon($array['hireDate']);
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
