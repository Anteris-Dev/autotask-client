<?php

namespace Anteris\Autotask\API\CompanySiteConfigurations;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents CompanySiteConfiguration entities.
 */
class CompanySiteConfigurationEntity extends DataTransferObject
{
    public int $companyID;
    public int $id;
    public ?string $locationName;

    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[] */
    public array $userDefinedFields;

    /**
     * Creates a new CompanySiteConfiguration entity.
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
