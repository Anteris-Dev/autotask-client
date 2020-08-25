<?php

namespace Anteris\Autotask\Support\EntityInformation;

use Exception;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents an entity information response from Autotask.
 */
class EntityInformationEntity extends DataTransferObject
{
    public string $name;
    public bool $canCreate;
    public bool $canDelete;
    public bool $canQuery;
    public bool $canUpdate;
    public string $userAccessForCreate;
    public string $userAccessForDelete;
    public string $userAccessForQuery;
    public string $userAccessForUpdate;
    public bool $hasUserDefinedFields;
    public bool $supportsWebhookCallouts;

    /**
     * Creates a new EntityInformationEntity from an http response.
     * 
     * @param  Response  $response  The http response to build the entity from.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): EntityInformationEntity
    {
        $array = json_decode($response->getBody(), true);

        if(! isset($array['info'])) {
            throw new Exception('Missing info key in response!');
        }

        return new static($array['info']);
    }
}
