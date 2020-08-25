<?php

namespace Anteris\Autotask\API\UserDefinedFieldDefinitions;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents UserDefinedFieldDefinition entities.
 */
class UserDefinedFieldDefinitionEntity extends DataTransferObject
{
    public ?Carbon $createDate;
    public ?int $crmToProjectUdfId;
    public int $dataType;
    public ?string $defaultValue;
    public ?string $description;
    public ?int $displayFormat;
    public int $id;
    public ?bool $isActive;
    public ?bool $isEncrypted;
    public ?bool $isFieldMapping;
    public ?bool $isPrivate;
    public ?bool $isProtected;
    public ?bool $isRequired;
    public ?bool $isVisibleToClientPortal;
    public ?string $mergeVariableName;
    public string $name;
    public ?int $numberOfDecimalPlaces;
    public ?int $sortOrder;
    public int $udfType;

    /**
     * Creates a new UserDefinedFieldDefinition entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['createDate'])) {
            $array['createDate'] = new Carbon($array['createDate']);
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
