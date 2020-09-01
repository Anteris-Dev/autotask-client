<?php

namespace Anteris\Autotask\API\InternalLocationWithBusinessHours;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents InternalLocationWithBusinessHour entities.
 */
class InternalLocationWithBusinessHourEntity extends DataTransferObject
{
    public ?string $additionalAddressInfo;
    public ?string $address1;
    public ?string $address2;
    public ?string $city;
    public ?int $countryID;
    public string $dateFormat;
    public ?int $firstDayOfWeek;
    public ?Carbon $fridayBusinessHoursEndTime;
    public ?Carbon $fridayBusinessHoursStartTime;
    public ?Carbon $fridayExtendedHoursEndTime;
    public ?Carbon $fridayExtendedHoursStartTime;
    public ?Carbon $holidayExtendedHoursEndTime;
    public ?Carbon $holidayExtendedHoursStartTime;
    public ?Carbon $holidayHoursEndTime;
    public ?Carbon $holidayHoursStartTime;
    public ?int $holidayHoursType;
    public ?int $holidaySetID;
    public $id;
    public ?bool $isDefault;
    public ?Carbon $mondayBusinessHoursEndTime;
    public ?Carbon $mondayBusinessHoursStartTime;
    public ?Carbon $mondayExtendedHoursEndTime;
    public ?Carbon $mondayExtendedHoursStartTime;
    public string $name;
    public ?bool $noHoursOnHolidays;
    public string $numberFormat;
    public ?string $postalCode;
    public ?Carbon $saturdayBusinessHoursEndTime;
    public ?Carbon $saturdayBusinessHoursStartTime;
    public ?Carbon $saturdayExtendedHoursEndTime;
    public ?Carbon $saturdayExtendedHoursStartTime;
    public ?string $state;
    public ?Carbon $sundayBusinessHoursEndTime;
    public ?Carbon $sundayBusinessHoursStartTime;
    public ?Carbon $sundayExtendedHoursEndTime;
    public ?Carbon $sundayExtendedHoursStartTime;
    public ?Carbon $thursdayBusinessHoursEndTime;
    public ?Carbon $thursdayBusinessHoursStartTime;
    public ?Carbon $thursdayExtendedHoursEndTime;
    public ?Carbon $thursdayExtendedHoursStartTime;
    public string $timeFormat;
    public int $timeZoneID;
    public ?Carbon $tuesdayBusinessHoursEndTime;
    public ?Carbon $tuesdayBusinessHoursStartTime;
    public ?Carbon $tuesdayExtendedHoursEndTime;
    public ?Carbon $tuesdayExtendedHoursStartTime;
    public ?Carbon $wednesdayBusinessHoursEndTime;
    public ?Carbon $wednesdayBusinessHoursStartTime;
    public ?Carbon $wednesdayExtendedHoursEndTime;
    public ?Carbon $wednesdayExtendedHoursStartTime;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new InternalLocationWithBusinessHour entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['fridayBusinessHoursEndTime'])) {
            $array['fridayBusinessHoursEndTime'] = new Carbon($array['fridayBusinessHoursEndTime']);
        }

        if (isset($array['fridayBusinessHoursStartTime'])) {
            $array['fridayBusinessHoursStartTime'] = new Carbon($array['fridayBusinessHoursStartTime']);
        }

        if (isset($array['fridayExtendedHoursEndTime'])) {
            $array['fridayExtendedHoursEndTime'] = new Carbon($array['fridayExtendedHoursEndTime']);
        }

        if (isset($array['fridayExtendedHoursStartTime'])) {
            $array['fridayExtendedHoursStartTime'] = new Carbon($array['fridayExtendedHoursStartTime']);
        }

        if (isset($array['holidayExtendedHoursEndTime'])) {
            $array['holidayExtendedHoursEndTime'] = new Carbon($array['holidayExtendedHoursEndTime']);
        }

        if (isset($array['holidayExtendedHoursStartTime'])) {
            $array['holidayExtendedHoursStartTime'] = new Carbon($array['holidayExtendedHoursStartTime']);
        }

        if (isset($array['holidayHoursEndTime'])) {
            $array['holidayHoursEndTime'] = new Carbon($array['holidayHoursEndTime']);
        }

        if (isset($array['holidayHoursStartTime'])) {
            $array['holidayHoursStartTime'] = new Carbon($array['holidayHoursStartTime']);
        }

        if (isset($array['mondayBusinessHoursEndTime'])) {
            $array['mondayBusinessHoursEndTime'] = new Carbon($array['mondayBusinessHoursEndTime']);
        }

        if (isset($array['mondayBusinessHoursStartTime'])) {
            $array['mondayBusinessHoursStartTime'] = new Carbon($array['mondayBusinessHoursStartTime']);
        }

        if (isset($array['mondayExtendedHoursEndTime'])) {
            $array['mondayExtendedHoursEndTime'] = new Carbon($array['mondayExtendedHoursEndTime']);
        }

        if (isset($array['mondayExtendedHoursStartTime'])) {
            $array['mondayExtendedHoursStartTime'] = new Carbon($array['mondayExtendedHoursStartTime']);
        }

        if (isset($array['saturdayBusinessHoursEndTime'])) {
            $array['saturdayBusinessHoursEndTime'] = new Carbon($array['saturdayBusinessHoursEndTime']);
        }

        if (isset($array['saturdayBusinessHoursStartTime'])) {
            $array['saturdayBusinessHoursStartTime'] = new Carbon($array['saturdayBusinessHoursStartTime']);
        }

        if (isset($array['saturdayExtendedHoursEndTime'])) {
            $array['saturdayExtendedHoursEndTime'] = new Carbon($array['saturdayExtendedHoursEndTime']);
        }

        if (isset($array['saturdayExtendedHoursStartTime'])) {
            $array['saturdayExtendedHoursStartTime'] = new Carbon($array['saturdayExtendedHoursStartTime']);
        }

        if (isset($array['sundayBusinessHoursEndTime'])) {
            $array['sundayBusinessHoursEndTime'] = new Carbon($array['sundayBusinessHoursEndTime']);
        }

        if (isset($array['sundayBusinessHoursStartTime'])) {
            $array['sundayBusinessHoursStartTime'] = new Carbon($array['sundayBusinessHoursStartTime']);
        }

        if (isset($array['sundayExtendedHoursEndTime'])) {
            $array['sundayExtendedHoursEndTime'] = new Carbon($array['sundayExtendedHoursEndTime']);
        }

        if (isset($array['sundayExtendedHoursStartTime'])) {
            $array['sundayExtendedHoursStartTime'] = new Carbon($array['sundayExtendedHoursStartTime']);
        }

        if (isset($array['thursdayBusinessHoursEndTime'])) {
            $array['thursdayBusinessHoursEndTime'] = new Carbon($array['thursdayBusinessHoursEndTime']);
        }

        if (isset($array['thursdayBusinessHoursStartTime'])) {
            $array['thursdayBusinessHoursStartTime'] = new Carbon($array['thursdayBusinessHoursStartTime']);
        }

        if (isset($array['thursdayExtendedHoursEndTime'])) {
            $array['thursdayExtendedHoursEndTime'] = new Carbon($array['thursdayExtendedHoursEndTime']);
        }

        if (isset($array['thursdayExtendedHoursStartTime'])) {
            $array['thursdayExtendedHoursStartTime'] = new Carbon($array['thursdayExtendedHoursStartTime']);
        }

        if (isset($array['tuesdayBusinessHoursEndTime'])) {
            $array['tuesdayBusinessHoursEndTime'] = new Carbon($array['tuesdayBusinessHoursEndTime']);
        }

        if (isset($array['tuesdayBusinessHoursStartTime'])) {
            $array['tuesdayBusinessHoursStartTime'] = new Carbon($array['tuesdayBusinessHoursStartTime']);
        }

        if (isset($array['tuesdayExtendedHoursEndTime'])) {
            $array['tuesdayExtendedHoursEndTime'] = new Carbon($array['tuesdayExtendedHoursEndTime']);
        }

        if (isset($array['tuesdayExtendedHoursStartTime'])) {
            $array['tuesdayExtendedHoursStartTime'] = new Carbon($array['tuesdayExtendedHoursStartTime']);
        }

        if (isset($array['wednesdayBusinessHoursEndTime'])) {
            $array['wednesdayBusinessHoursEndTime'] = new Carbon($array['wednesdayBusinessHoursEndTime']);
        }

        if (isset($array['wednesdayBusinessHoursStartTime'])) {
            $array['wednesdayBusinessHoursStartTime'] = new Carbon($array['wednesdayBusinessHoursStartTime']);
        }

        if (isset($array['wednesdayExtendedHoursEndTime'])) {
            $array['wednesdayExtendedHoursEndTime'] = new Carbon($array['wednesdayExtendedHoursEndTime']);
        }

        if (isset($array['wednesdayExtendedHoursStartTime'])) {
            $array['wednesdayExtendedHoursStartTime'] = new Carbon($array['wednesdayExtendedHoursStartTime']);
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
