<?php

namespace Anteris\Autotask\API\ContactWebhookUdfFields;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of ContactWebhookUdfField entities.
 * @see ContactWebhookUdfFieldEntity
 */
class ContactWebhookUdfFieldCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ContactWebhookUdfFieldEntity
    {
        return parent::current();
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): ContactWebhookUdfFieldCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ContactWebhookUdfFieldEntity::arrayOf($array['items'])
        );
    }
}
