<?php

namespace Anteris\Autotask\API\CompanyWebhookFields;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of CompanyWebhookField entities.
 * @see CompanyWebhookFieldEntity
 */
class CompanyWebhookFieldCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): CompanyWebhookFieldEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): CompanyWebhookFieldEntity
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
    public static function fromResponse(Response $response): CompanyWebhookFieldCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            CompanyWebhookFieldEntity::arrayOf($array['items'])
        );
    }
}
