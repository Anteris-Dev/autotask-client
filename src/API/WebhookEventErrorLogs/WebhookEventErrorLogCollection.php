<?php

namespace Anteris\Autotask\API\WebhookEventErrorLogs;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of WebhookEventErrorLog entities.
 * @see WebhookEventErrorLogEntity
 */
class WebhookEventErrorLogCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): WebhookEventErrorLogEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): WebhookEventErrorLogEntity
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
    public static function fromResponse(Response $response): WebhookEventErrorLogCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            WebhookEventErrorLogEntity::arrayOf($array['items'])
        );
    }
}
