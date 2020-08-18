<?php

namespace Anteris\Autotask\API\ContactBillingProductAssociations;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContactBillingProductAssociation entities.
 */
class ContactBillingProductAssociationEntity extends DataTransferObject
{
    public int $billingProductID;
    public int $contactID;
    public Carbon $effectiveDate;
    public ?Carbon $expirationDate;
    public int $id;
    public array $userDefinedFields = [];

    /**
     * Creates a new ContactBillingProductAssociation entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['effectiveDate'])) {
            $array['effectiveDate'] = new Carbon($array['effectiveDate']);
        }

        if (isset($array['expirationDate'])) {
            $array['expirationDate'] = new Carbon($array['expirationDate']);
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
