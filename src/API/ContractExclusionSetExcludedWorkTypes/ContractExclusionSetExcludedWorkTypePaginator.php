<?php

namespace Anteris\Autotask\API\ContractExclusionSetExcludedWorkTypes;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\Pagination\PageEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Returns a collection with methods that help page through results.
 */
class ContractExclusionSetExcludedWorkTypePaginator
{
    /** @var ContractExclusionSetExcludedWorkTypeCollection Collection of contractexclusionsetexcludedworktypes. */
    public ContractExclusionSetExcludedWorkTypeCollection $collection;

    /** @var HttpClient Http client for retrieving pages. */
    protected HttpClient $client;

    /** @var PageEntity Page data transfer object. */
    protected PageEntity $page;

    /**
     * Sets up the paginator.
     *
     * @param  HttpClient  $client    Http client for retrieving pages.
     * @param  Response    $response  Response from Http client.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client, $response)
    {
        $this->client = $client;
        $this->collection = ContractExclusionSetExcludedWorkTypeCollection::fromResponse($response);
        $this->page = PageEntity::fromResponse($response);
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
    public function nextPage(): ContractExclusionSetExcludedWorkTypePaginator
    {
        $response = $this->client->getClient()->get($this->page->nextPageUrl);
        return new static($this->client, $response);
    }

    /**
     * Retrieves and returns the previous page.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function prevPage (): ContractExclusionSetExcludedWorkTypePaginator
    {
        $response = $this->client->getClient()->get($this->page->prevPageUrl);
        return new static($this->client, $response);
    }
}
