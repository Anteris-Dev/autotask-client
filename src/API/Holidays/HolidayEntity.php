<?php

namespace Anteris\Autotask\API\Holidays;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents Holiday entities.
 */
class HolidayEntity extends DataTransferObject
{
    public Carbon $holidayDate;
    public string $holidayName;
    public int $holidaySetID;
    public int $id;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['holidayDate'] = new Carbon($array['holidayDate']);
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
