<?php

namespace Anteris\Autotask\API\DocumentConfigurationItemCategoryAssociations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\Pagination\PageEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Returns a collection with methods that help page through results.
 */
class DocumentConfigurationItemCategoryAssociationPaginator
{
    /** @var DocumentConfigurationItemCategoryAssociationCollection Collection of documentconfigurationitemcategoryassociations. */
    public DocumentConfigurationItemCategoryAssociationCollection $collection;

    /** @var HttpClient Http client for retrieving pages. */
    protected HttpClient $client;

    /** @var PageEntity Page data transfer object. */
    protected PageEntity $page;

    /** @var array Search params for POST /query request */
    protected $postParams;

    /**
     * Sets up the paginator.
     *
     * @param  HttpClient  $client    Http client for retrieving pages.
     * @param  Response    $response  Response from Http client.
     * @param  array       $postParams Search params for POST /query request
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client, $response, $postParams = null)
    {
        $this->client = $client;
        $this->collection = DocumentConfigurationItemCategoryAssociationCollection::fromResponse($response);
        $this->page = PageEntity::fromResponse($response);
        $this->postParams = $postParams;
    }

    /**
     * If a next page exists, returns true. Otherwise returns false.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function hasNextPage(): bool
    {
        if(! $this->page->nextPageUrl) {
            return false;
        }

        return true;
    }

    /**
     * If a previous page exists, returns true. Otherwise returns false.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function hasPrevPage(): bool
    {
        if (!$this->page->prevPageUrl) {
            return false;
        }

        return true;
    }

    /**
     * Retrieves and returns the next page.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function nextPage(): DocumentConfigurationItemCategoryAssociationPaginator
    {
        if(is_null($this->postParams)){
            $response = $this->client->getClient()->get($this->page->nextPageUrl);
        }else{
            $response = $this->client->getClient()->post($this->page->nextPageUrl, ['json' => $this->postParams]);
        }

        return new static($this->client, $response);
    }

    /**
     * Retrieves and returns the previous page.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function prevPage (): DocumentConfigurationItemCategoryAssociationPaginator
    {
        if(is_null($this->postParams)){
            $response = $this->client->getClient()->get($this->page->prevPageUrl);
        }else{
            $response = $this->client->getClient()->post($this->page->prevPageUrl, ['json' => $this->postParams]);
        }

        return new static($this->client, $response);
    }
}
