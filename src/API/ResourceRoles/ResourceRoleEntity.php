<?php

namespace Anteris\Autotask\API\ResourceRoles;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ResourceRole entities.
 */
class ResourceRoleEntity extends DataTransferObject
{
    public ?int $departmentID;
    public int $id;
    public ?bool $isActive;
    public ?int $queueID;
    public int $resourceID;
    public int $roleID;
    public array $userDefinedFields = [];

    /**
     * Creates a new ResourceRole entity.
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
