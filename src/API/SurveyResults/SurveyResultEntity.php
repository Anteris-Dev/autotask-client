<?php

namespace Anteris\Autotask\API\SurveyResults;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents SurveyResult entities.
 */
class SurveyResultEntity extends DataTransferObject
{
    public ?int $companyID;
    public ?float $companyRating;
    public ?Carbon $completeDate;
    public ?int $contactID;
    public ?float $contactRating;
    public int $id;
    public ?float $resourceRating;
    public ?Carbon $sendDate;
    public int $surveyID;
    public ?float $surveyRating;
    public ?int $ticketID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['completeDate'] = new Carbon($array['completeDate']);
        $array['sendDate'] = new Carbon($array['sendDate']);
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
