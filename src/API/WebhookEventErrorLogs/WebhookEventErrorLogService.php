<?php

namespace Anteris\Autotask\API\WebhookEventErrorLogs;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask WebhookEventErrorLogs.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/WebhookEventErrorLogsEntity.htm Autotask documentation.
 */
class WebhookEventErrorLogService
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
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the WebhookEventErrorLog to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("WebhookEventErrorLogs/$id");
    }

    /**
     * Finds the WebhookEventErrorLog based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): WebhookEventErrorLogEntity
    {
        return WebhookEventErrorLogEntity::fromResponse(
            $this->client->get("WebhookEventErrorLogs/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see WebhookEventErrorLogQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): WebhookEventErrorLogQueryBuilder
    {
        return new WebhookEventErrorLogQueryBuilder($this->client);
    }

}
