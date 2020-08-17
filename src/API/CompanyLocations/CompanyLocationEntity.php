<?php

namespace Anteris\Autotask\API\CompanyLocations;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents CompanyLocation entities.
 */
class CompanyLocationEntity extends DataTransferObject
{
    public ?string $address1;
    public ?string $address2;
    public ?string $alternatePhone1;
    public ?string $alternatePhone2;
    public ?string $city;
    public int $companyID;
    public ?int $countryID;
    public ?string $description;
    public ?string $fax;
    public int $id;
    public ?bool $isActive;
    public ?bool $isPrimary;
    public ?bool $isTaxExempt;
    public string $name;
    public ?bool $overrideCompanyTaxSettings;
    public ?string $phone;
    public ?string $postalCode;
    public ?float $roundtripDistance;
    public ?string $state;
    public ?int $taxRegionID;
    public array $userDefinedFields = [];

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
