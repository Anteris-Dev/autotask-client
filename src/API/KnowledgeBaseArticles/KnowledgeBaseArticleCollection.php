<?php

namespace Anteris\Autotask\API\KnowledgeBaseArticles;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of KnowledgeBaseArticle entities.
 * @see KnowledgeBaseArticleEntity
 */
class KnowledgeBaseArticleCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): KnowledgeBaseArticleEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): KnowledgeBaseArticleEntity
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
    public static function fromResponse(Response $response): KnowledgeBaseArticleCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            KnowledgeBaseArticleEntity::arrayOf($array['items'])
        );
    }
}
