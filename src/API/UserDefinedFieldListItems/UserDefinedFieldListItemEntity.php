<?php

namespace Anteris\Autotask\API\UserDefinedFieldListItems;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents UserDefinedFieldListItem entities.
 */
class UserDefinedFieldListItemEntity extends DataTransferObject
{
    public ?Carbon $createDate;
    public int $id;
    public int $udfFieldId;
    public string $valueForDisplay;
    public string $valueForExport;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDate'] = new Carbon($array['createDate']);
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
