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
    public int $id;
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
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['fridayBusinessHoursEndTime'] = new Carbon($array['fridayBusinessHoursEndTime']);
        $array['fridayBusinessHoursStartTime'] = new Carbon($array['fridayBusinessHoursStartTime']);
        $array['fridayExtendedHoursEndTime'] = new Carbon($array['fridayExtendedHoursEndTime']);
        $array['fridayExtendedHoursStartTime'] = new Carbon($array['fridayExtendedHoursStartTime']);
        $array['holidayExtendedHoursEndTime'] = new Carbon($array['holidayExtendedHoursEndTime']);
        $array['holidayExtendedHoursStartTime'] = new Carbon($array['holidayExtendedHoursStartTime']);
        $array['holidayHoursEndTime'] = new Carbon($array['holidayHoursEndTime']);
        $array['holidayHoursStartTime'] = new Carbon($array['holidayHoursStartTime']);
        $array['mondayBusinessHoursEndTime'] = new Carbon($array['mondayBusinessHoursEndTime']);
        $array['mondayBusinessHoursStartTime'] = new Carbon($array['mondayBusinessHoursStartTime']);
        $array['mondayExtendedHoursEndTime'] = new Carbon($array['mondayExtendedHoursEndTime']);
        $array['mondayExtendedHoursStartTime'] = new Carbon($array['mondayExtendedHoursStartTime']);
        $array['saturdayBusinessHoursEndTime'] = new Carbon($array['saturdayBusinessHoursEndTime']);
        $array['saturdayBusinessHoursStartTime'] = new Carbon($array['saturdayBusinessHoursStartTime']);
        $array['saturdayExtendedHoursEndTime'] = new Carbon($array['saturdayExtendedHoursEndTime']);
        $array['saturdayExtendedHoursStartTime'] = new Carbon($array['saturdayExtendedHoursStartTime']);
        $array['sundayBusinessHoursEndTime'] = new Carbon($array['sundayBusinessHoursEndTime']);
        $array['sundayBusinessHoursStartTime'] = new Carbon($array['sundayBusinessHoursStartTime']);
        $array['sundayExtendedHoursEndTime'] = new Carbon($array['sundayExtendedHoursEndTime']);
        $array['sundayExtendedHoursStartTime'] = new Carbon($array['sundayExtendedHoursStartTime']);
        $array['thursdayBusinessHoursEndTime'] = new Carbon($array['thursdayBusinessHoursEndTime']);
        $array['thursdayBusinessHoursStartTime'] = new Carbon($array['thursdayBusinessHoursStartTime']);
        $array['thursdayExtendedHoursEndTime'] = new Carbon($array['thursdayExtendedHoursEndTime']);
        $array['thursdayExtendedHoursStartTime'] = new Carbon($array['thursdayExtendedHoursStartTime']);
        $array['tuesdayBusinessHoursEndTime'] = new Carbon($array['tuesdayBusinessHoursEndTime']);
        $array['tuesdayBusinessHoursStartTime'] = new Carbon($array['tuesdayBusinessHoursStartTime']);
        $array['tuesdayExtendedHoursEndTime'] = new Carbon($array['tuesdayExtendedHoursEndTime']);
        $array['tuesdayExtendedHoursStartTime'] = new Carbon($array['tuesdayExtendedHoursStartTime']);
        $array['wednesdayBusinessHoursEndTime'] = new Carbon($array['wednesdayBusinessHoursEndTime']);
        $array['wednesdayBusinessHoursStartTime'] = new Carbon($array['wednesdayBusinessHoursStartTime']);
        $array['wednesdayExtendedHoursEndTime'] = new Carbon($array['wednesdayExtendedHoursEndTime']);
        $array['wednesdayExtendedHoursStartTime'] = new Carbon($array['wednesdayExtendedHoursStartTime']);
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
