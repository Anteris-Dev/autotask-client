<?php

namespace Tests;

use Anteris\Autotask\Client;
use Dotenv\Dotenv;
use Exception;
use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    /** @var Client The API client we are interacting with. */
    protected Client $client;

    /**
     * Sets up the classes for interacting with the client.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function setUp(): void
    {
        // Start by trying to load environment variables
        if (file_exists( __DIR__ . '/../.env')) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
            $dotenv->load();
        }

        // Next check each individual one
        $username   = getenv('AUTOTASK_API_USERNAME');
        $secret     = getenv('AUTOTASK_API_SECRET');
        $ic         = getenv('AUTOTASK_API_INTEGRATION_CODE');
        $baseUri    = getenv('AUTOTASK_API_BASE_URI');

        if (! $username) {
            throw new Exception('Unable to find find AUTOTASK_API_USERNAME env variable!');
        }

        if (! $secret) {
            throw new Exception('Unable to find find AUTOTASK_API_SECRET env variable!');
        }

        if (! $ic) {
            throw new Exception('Unable to find find AUTOTASK_API_INTEGRATION_CODE env variable!');
        }

        if (! $baseUri) {
            throw new Exception('Unable to find find AUTOTASK_API_BASE_URI env variable!');
        }

        // Now try creating the client
        $this->client = new Client(
            $username,
            $secret,
            $ic,
            $baseUri
        );
    }
}
