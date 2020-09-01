<?php

namespace Anteris\Autotask\API\ServiceBundles;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ServiceBundle entities.
 */
class ServiceBundleEntity extends DataTransferObject
{
    public int $billingCodeID;
    public ?Carbon $createDate;
    public ?int $creatorResourceID;
    public ?string $description;
    public $id;
    public ?string $invoiceDescription;
    public ?bool $isActive;
    public ?Carbon $lastModifiedDate;
    public string $name;
    public ?float $percentageDiscount;
    public int $periodType;
    public $serviceLevelAgreementID;
    public ?float $unitCost;
    public ?float $unitDiscount;
    public ?float $unitPrice;
    public ?int $updateResourceID;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new ServiceBundle entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['lastModifiedDate'])) {
            $array['lastModifiedDate'] = new Carbon($array['lastModifiedDate']);
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
