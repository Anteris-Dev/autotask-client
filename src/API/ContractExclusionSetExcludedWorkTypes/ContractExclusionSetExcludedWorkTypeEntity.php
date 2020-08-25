<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedWorkTypes;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractExclusionSetExcludedWorkType entities.
 */
class ContractExclusionSetExcludedWorkTypeEntity extends DataTransferObject
{
    public int $contractExclusionSetID;
    public int $excludedWorkTypeID;
    public int $id;

    /**
     * Creates a new ContractExclusionSetExcludedWorkType entity.
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
