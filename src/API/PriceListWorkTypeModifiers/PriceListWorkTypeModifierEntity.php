<?php

namespace Anteris\Autotask\API\PriceListWorkTypeModifiers;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents PriceListWorkTypeModifier entities.
 */
class PriceListWorkTypeModifierEntity extends DataTransferObject
{
    public int $currencyID;
    public int $id;
    public ?int $modifierType;
    public ?float $modifierValue;
    public bool $usesInternalCurrencyPrice;
    public int $workTypeModifierID;
    public array $userDefinedFields = [];

    /**
     * Creates a new PriceListWorkTypeModifier entity.
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
