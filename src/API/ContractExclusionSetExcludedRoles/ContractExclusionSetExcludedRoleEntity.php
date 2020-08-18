<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedRoles;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContractExclusionSetExcludedRole entities.
 */
class ContractExclusionSetExcludedRoleEntity extends DataTransferObject
{
    public int $contractExclusionSetID;
    public int $excludedRoleID;
    public int $id;
    public array $userDefinedFields = [];

    /**
     * Creates a new ContractExclusionSetExcludedRole entity.
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
