<?php

namespace Anteris\Autotask\API\ExpenseReports;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ExpenseReport entities.
 */
class ExpenseReportEntity extends DataTransferObject
{
    public ?float $amountDue;
    public ?Carbon $approvedDate;
    public ?int $approverID;
    public ?string $departmentNumber;
    public int $id;
    public ?float $internalCurrencyCashAdvanceAmount;
    public ?float $internalCurrencyExpenseTotal;
    public string $name;
    public ?int $organizationalLevelAssociationID;
    public ?string $quickBooksReferenceNumber;
    public ?float $reimbursementCurrencyAmountDue;
    public ?float $reimbursementCurrencyCashAdvanceAmount;
    public ?int $reimbursementCurrencyID;
    public ?string $rejectionReason;
    public ?int $status;
    public ?bool $submit;
    public ?Carbon $submitDate;
    public int $submitterID;
    public Carbon $weekEnding;
    public array $userDefinedFields = [];

    /**
     * Creates a new ExpenseReport entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['approvedDate'])) {
            $array['approvedDate'] = new Carbon($array['approvedDate']);
        }

        if (isset($array['submitDate'])) {
            $array['submitDate'] = new Carbon($array['submitDate']);
        }

        if (isset($array['weekEnding'])) {
            $array['weekEnding'] = new Carbon($array['weekEnding']);
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
