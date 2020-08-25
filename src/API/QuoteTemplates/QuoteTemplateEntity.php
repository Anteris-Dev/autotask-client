<?php

namespace Anteris\Autotask\API\QuoteTemplates;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents QuoteTemplate entities.
 */
class QuoteTemplateEntity extends DataTransferObject
{
    public ?bool $calculateTaxSeparately;
    public ?Carbon $createDate;
    public ?int $createdBy;
    public string $currencyNegativeFormat;
    public string $currencyPositiveFormat;
    public ?int $dateFormat;
    public ?string $description;
    public ?bool $displayTaxCategorySuperscripts;
    public int $id;
    public ?bool $isActive;
    public ?int $lastActivityBy;
    public ?Carbon $lastActivityDate;
    public string $name;
    public ?int $numberFormat;
    public ?int $pageLayout;
    public ?int $pageNumberFormat;
    public ?bool $showEachTaxInGroup;
    public ?bool $showGridHeader;
    public ?bool $showTaxCategory;
    public ?bool $showVerticalGridLines;

    /**
     * Creates a new QuoteTemplate entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
        }

        if (isset($array['lastActivityDate'])) {
            $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
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
