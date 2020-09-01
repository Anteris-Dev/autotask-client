<?php

namespace Anteris\Autotask\API\Invoices;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Invoice entities.
 */
class InvoiceEntity extends DataTransferObject
{
    public ?int $batchID;
    public ?string $comments;
    public ?int $companyID;
    public ?Carbon $createDateTime;
    public ?int $creatorResourceID;
    public ?Carbon $dueDate;
    public ?Carbon $fromDate;
    public $id;
    public Carbon $invoiceDateTime;
    public ?int $invoiceEditorTemplateID;
    public ?string $invoiceNumber;
    public ?float $invoiceTotal;
    public ?bool $isVoided;
    public ?string $orderNumber;
    public ?Carbon $paidDate;
    public ?int $paymentTerm;
    public ?int $taxGroup;
    public ?string $taxRegionName;
    public ?Carbon $toDate;
    public ?float $totalTaxValue;
    public ?int $voidedByResourceID;
    public ?Carbon $voidedDate;
    public ?Carbon $webServiceDate;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new Invoice entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDateTime'])) {
            $array['createDateTime'] = new Carbon($array['createDateTime']);
        }

        if (isset($array['dueDate'])) {
            $array['dueDate'] = new Carbon($array['dueDate']);
        }

        if (isset($array['fromDate'])) {
            $array['fromDate'] = new Carbon($array['fromDate']);
        }

        if (isset($array['invoiceDateTime'])) {
            $array['invoiceDateTime'] = new Carbon($array['invoiceDateTime']);
        }

        if (isset($array['paidDate'])) {
            $array['paidDate'] = new Carbon($array['paidDate']);
        }

        if (isset($array['toDate'])) {
            $array['toDate'] = new Carbon($array['toDate']);
        }

        if (isset($array['voidedDate'])) {
            $array['voidedDate'] = new Carbon($array['voidedDate']);
        }

        if (isset($array['webServiceDate'])) {
            $array['webServiceDate'] = new Carbon($array['webServiceDate']);
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
