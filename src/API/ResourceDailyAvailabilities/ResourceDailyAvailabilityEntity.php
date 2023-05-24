<?php

namespace Anteris\Autotask\API\ResourceDailyAvailabilities;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ResourceDailyAvailability entities.
 */
class ResourceDailyAvailabilityEntity extends DataTransferObject
{
    public ?float $fridayAvailableHours;
    public $id;
    public ?float $mondayAvailableHours;
    public int $resourceID;
    public ?float $saturdayAvailableHours;
    public ?float $sundayAvailableHours;
    public ?float $thursdayAvailableHours;
    public ?string $travelAvailability;
    public ?float $tuesdayAvailableHours;
    public ?float $wednesdayAvailableHours;
    public ?float $weeklyBillableHoursGoal;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new ResourceDailyAvailability entity.
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
