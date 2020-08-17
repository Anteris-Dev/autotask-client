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
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDate'] = new Carbon($array['createDate']);
        $array['lastActivityDate'] = new Carbon($array['lastActivityDate']);
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
