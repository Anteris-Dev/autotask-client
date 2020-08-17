<?php

namespace Anteris\Autotask\API\TicketChecklistLibraries;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask TicketChecklistLibraries.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/TicketChecklistLibrariesEntity.htm Autotask documentation.
 */
class TicketChecklistLibraryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new ticketchecklistlibrary.
     *
     * @param  TicketChecklistLibraryEntity  $resource  The ticketchecklistlibrary entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(TicketChecklistLibraryEntity $resource)
    {
        $this->client->post("TicketChecklistLibraries", $resource->toArray());
    }



}
