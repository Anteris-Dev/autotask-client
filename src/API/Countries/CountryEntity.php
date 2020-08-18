<?php

namespace Anteris\Autotask\API\Countries;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Country entities.
 */
class CountryEntity extends DataTransferObject
{
    public int $addressFormatID;
    public ?string $countryCode;
    public string $displayName;
    public int $id;
    public ?int $invoiceTemplateID;
    public ?bool $isActive;
    public ?bool $isDefaultCountry;
    public ?string $name;
    public ?int $quoteTemplateID;
    public array $userDefinedFields = [];

    /**
     * Creates a new Country entity.
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
