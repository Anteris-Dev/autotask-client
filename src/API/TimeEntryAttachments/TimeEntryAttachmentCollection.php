<?php

namespace Anteris\Autotask\API\TimeEntryAttachments;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of TimeEntryAttachment entities.
 * @see TimeEntryAttachmentEntity
 */
class TimeEntryAttachmentCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): TimeEntryAttachmentEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): TimeEntryAttachmentEntity
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
    public static function fromResponse(Response $response): TimeEntryAttachmentCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            TimeEntryAttachmentEntity::arrayOf($array['items'])
        );
    }
}
