<?php

namespace Anteris\Autotask\API\IntegrationVendorWidgets;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of IntegrationVendorWidget entities.
 * @see IntegrationVendorWidgetEntity
 */
class IntegrationVendorWidgetCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): IntegrationVendorWidgetEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): IntegrationVendorWidgetEntity
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
    public static function fromResponse(Response $response): IntegrationVendorWidgetCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            IntegrationVendorWidgetEntity::arrayOf($array['items'])
        );
    }
}
