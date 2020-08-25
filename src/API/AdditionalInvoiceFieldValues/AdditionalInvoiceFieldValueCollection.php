<?php

namespace Anteris\Autotask\API\AdditionalInvoiceFieldValues;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of AdditionalInvoiceFieldValue entities.
 * @see AdditionalInvoiceFieldValueEntity
 */
class AdditionalInvoiceFieldValueCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): AdditionalInvoiceFieldValueEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): AdditionalInvoiceFieldValueEntity
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
    public static function fromResponse(Response $response): AdditionalInvoiceFieldValueCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            AdditionalInvoiceFieldValueEntity::arrayOf($array['items'])
        );
    }
}
