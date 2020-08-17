<?php

namespace Anteris\Autotask\API\ExpenseItems;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ExpenseItem entities.
 */
class ExpenseItemEntity extends DataTransferObject
{
    public ?int $companyID;
    public string $description;
    public ?string $destination;
    public ?string $entertainmentLocation;
    public int $expenseCategory;
    public ?float $expenseCurrencyExpenseAmount;
    public ?int $expenseCurrencyID;
    public Carbon $expenseDate;
    public int $expenseReportID;
    public ?string $gLCode;
    public bool $haveReceipt;
    public int $id;
    public ?float $internalCurrencyExpenseAmount;
    public ?float $internalCurrencyReimbursementAmount;
    public bool $isBillableToCompany;
    public ?bool $isReimbursable;
    public ?bool $isRejected;
    public ?float $miles;
    public ?float $odometerEnd;
    public ?float $odometerStart;
    public ?string $origin;
    public int $paymentType;
    public ?int $projectID;
    public ?string $purchaseOrderNumber;
    public ?float $reimbursementCurrencyReimbursementAmount;
    public ?int $taskID;
    public ?int $ticketID;
    public ?int $workType;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['expenseDate'] = new Carbon($array['expenseDate']);
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
