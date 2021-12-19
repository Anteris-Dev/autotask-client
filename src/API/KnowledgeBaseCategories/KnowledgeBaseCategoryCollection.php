<?php

namespace Anteris\Autotask\API\KnowledgeBaseCategories;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of KnowledgeBaseCategory entities.
 * @see KnowledgeBaseCategoryEntity
 */
class KnowledgeBaseCategoryCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): KnowledgeBaseCategoryEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): KnowledgeBaseCategoryEntity
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
    public static function fromResponse(Response $response): KnowledgeBaseCategoryCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            KnowledgeBaseCategoryEntity::arrayOf($array['items'])
        );
    }
}
