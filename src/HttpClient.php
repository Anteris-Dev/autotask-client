<?php

namespace Anteris\Autotask;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response;

/**
 * A minimalist client for interacting with the Autotask API. This client sets
 * authentication headers for Guzzle and adds a wrapper for basic http requests.
 */
class HttpClient
{
    /** @var The client used to make HTTP requests. */
    protected GuzzleClient $client;

    /**
     * Creates a new HTTP client with headers to authenticate with Autotask.
     *
     * @param  string  $username         Autotask API user's username.
     * @param  string  $secret           Autotask API user's password.
     * @param  string  $integrationCode  Autotask API user's integration code.
     * @param  string  $baseUri          Autotask API URL.
     */
    public function __construct(
        string $username,
        string $secret,
        string $integrationCode,
        string $baseUri
    )
    {
        // This line handles the versioning of the base URL (or the lack of it)
        $baseUri = str_replace('/v1.0', '', $baseUri);
        $baseUri = rtrim($baseUri, '/');
        $baseUri = $baseUri . '/v1.0/';

        // Now create the client
        $this->client = new GuzzleClient([
            'base_uri' => $baseUri,
            'headers' => [
                'Username' => $username,
                'Secret' => $secret,
                'APIIntegrationcode' => $integrationCode,
                'Content-Type' => 'application/json',
            ],
            'http_errors' => true,
        ]);
    }

    /**
     * Retrieves the requested endpoint.
     *
     * @param  string  $endpoint   The endpoint to request.
     * @param  array   $parameters Optional parameters to add to the request.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function get(string $endpoint, array $parameters = []) : Response
    {
        return $this->client->get($endpoint, [
            'query' => $parameters
        ]);
    }

    /**
     * Retrieves the GuzzleClient underneath this interface allowing raw queries
     * to be performed using Autotask credentials.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getClient(): GuzzleClient
    {
        return $this->client;
    }

    /**
     * Updates the specified resource with a PATCH request.
     *
     * @param  string  $endpoint  The endpoint where the resource to be updated exists.
     * @param  array   $payload   The fields to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function patch(string $endpoint, array $payload) : Response
    {
        return $this->client->patch($endpoint, [
            'json'  => $payload,
        ]);
    }

    /**
     * Creates a resource with a POST request.
     *
     * @param  string  $endpoint  The resource to be created.
     * @param  array   $payload   The resource information.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function post(string $endpoint, array $payload) : Response
    {
        return $this->client->post($endpoint, [
            'json' => $payload
        ]);
    }

    /**
     * Updates the specified resource with a PUT request.
     *
     * @param  string  $endpoint  The endpoint where the resource to be updated exists.
     * @param  array   $payload   The fields to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function put(string $endpoint, array $payload) : Response
    {
        return $this->client->put($endpoint, [
            'json'  => $payload,
        ]);
    }

    /**
     * Deletes the specified resource.
     *
     * @param  string  $endpoint  The endpoint where the resource to be deleted exists.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function delete(string $endpoint) : Response
    {
        return $this->client->delete($endpoint);
    }
}
