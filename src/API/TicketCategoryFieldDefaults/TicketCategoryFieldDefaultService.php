<?php

namespace Anteris\Autotask\API\TicketCategoryFieldDefaults;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask TicketCategoryFieldDefaults.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketCategoryFieldDefaultsEntity.htm Autotask documentation.
 */
class TicketCategoryFieldDefaultService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    /**
     * Instantiates the class.
     *
     * @param  HttpClient  $client  The http client that will be used to interact with the API.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Finds the TicketCategoryFieldDefault based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): TicketCategoryFieldDefaultEntity
    {
        return TicketCategoryFieldDefaultEntity::fromResponse(
            $this->client->get("TicketCategoryFieldDefaults/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see TicketCategoryFieldDefaultQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): TicketCategoryFieldDefaultQueryBuilder
    {
        return new TicketCategoryFieldDefaultQueryBuilder($this->client);
    }

}
