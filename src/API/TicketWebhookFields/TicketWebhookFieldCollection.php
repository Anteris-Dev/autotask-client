<?php

namespace Anteris\Autotask\API\TicketWebhookFields;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of TicketWebhookField entities.
 * @see TicketWebhookFieldEntity
 */
class TicketWebhookFieldCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): TicketWebhookFieldEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): TicketWebhookFieldEntity
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
    public static function fromResponse(Response $response): TicketWebhookFieldCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            TicketWebhookFieldEntity::arrayOf($array['items'])
        );
    }
}
