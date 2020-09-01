<?php

namespace Anteris\Autotask\API\SalesOrders;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents SalesOrder entities.
 */
class SalesOrderEntity extends DataTransferObject
{
    public ?string $additionalBillToAddressInformation;
    public ?string $additionalShipToAddressInformation;
    public ?string $billingAddress1;
    public ?string $billingAddress2;
    public ?string $billToCity;
    public ?int $billToCountryID;
    public ?string $billToPostalCode;
    public ?string $billToState;
    public int $companyID;
    public int $contactID;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public int $opportunityID;
    public ?int $organizationalLevelAssociationID;
    public int $ownerResourceID;
    public ?Carbon $promisedFulfillmentDate;
    public Carbon $salesOrderDate;
    public ?string $shipToAddress1;
    public ?string $shipToAddress2;
    public ?string $shipToCity;
    public ?int $shipToCountryID;
    public ?string $shipToPostalCode;
    public ?string $shipToState;
    public int $status;
    public string $title;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new SalesOrder entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['promisedFulfillmentDate'])) {
            $array['promisedFulfillmentDate'] = new Carbon($array['promisedFulfillmentDate']);
        }

        if (isset($array['salesOrderDate'])) {
            $array['salesOrderDate'] = new Carbon($array['salesOrderDate']);
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
