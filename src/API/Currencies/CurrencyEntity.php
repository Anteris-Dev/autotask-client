<?php

namespace Anteris\Autotask\API\Currencies;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Currency entities.
 */
class CurrencyEntity extends DataTransferObject
{
    public string $currencyNegativeFormat;
    public string $currencyPositiveFormat;
    public string $description;
    public int $displaySymbol;
    public float $exchangeRate;
    public int $id;
    public bool $isActive;
    public bool $isInternalCurrency;
    public ?Carbon $lastModifiedDateTime;
    public string $name;
    public ?int $updateResourceId;
    public array $userDefinedFields = [];

    /**
     * Creates a new Currency entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['lastModifiedDateTime'])) {
            $array['lastModifiedDateTime'] = new Carbon($array['lastModifiedDateTime']);
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
