<?php

namespace Anteris\Autotask\API\DeletedTaskActivityLogs;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of DeletedTaskActivityLog entities.
 * @see DeletedTaskActivityLogEntity
 */
class DeletedTaskActivityLogCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): DeletedTaskActivityLogEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): DeletedTaskActivityLogEntity
    {
        return parent::offsetGet($offset);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): DeletedTaskActivityLogCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            DeletedTaskActivityLogEntity::arrayOf($array['items'])
        );
    }
}
