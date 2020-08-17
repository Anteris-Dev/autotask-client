<?php

namespace Anteris\Autotask\API\Services;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Service entities.
 */
class ServiceEntity extends DataTransferObject
{
    public int $billingCodeID;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public ?string $description;
    public int $id;
    public ?string $invoiceDescription;
    public ?bool $isActive;
    public ?Carbon $lastModifiedDate;
    public ?float $markupRate;
    public string $name;
    public int $periodType;
    public ?int $serviceLevelAgreementID;
    public ?float $unitCost;
    public float $unitPrice;
    public ?int $updateResourceID;
    public ?int $vendorCompanyID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDate'] = new Carbon($array['createDate']);
        $array['lastModifiedDate'] = new Carbon($array['lastModifiedDate']);
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
