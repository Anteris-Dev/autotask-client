<?php

namespace Anteris\Autotask\API\InvoiceTemplates;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of InvoiceTemplate entities.
 * @see InvoiceTemplateEntity
 */
class InvoiceTemplateCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): InvoiceTemplateEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): InvoiceTemplateEntity
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
    public static function fromResponse(Response $response): InvoiceTemplateCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            InvoiceTemplateEntity::arrayOf($array['items'])
        );
    }
}
