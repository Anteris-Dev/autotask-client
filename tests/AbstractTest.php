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
        } else {
            throw new Exception('Unable to find environment file!');
        }

        // Next check each individual one
        if (! isset($_ENV['AUTOTASK_API_USERNAME'])) {
            throw new Exception('Unable to find find AUTOTASK_API_USERNAME env variable!');
        }

        if (! isset($_ENV['AUTOTASK_API_SECRET'])) {
            throw new Exception('Unable to find find AUTOTASK_API_SECRET env variable!');
        }

        if (! isset($_ENV['AUTOTASK_API_INTEGRATION_CODE'])) {
            throw new Exception('Unable to find find AUTOTASK_API_INTEGRATION_CODE env variable!');
        }

        if (! isset($_ENV['AUTOTASK_API_BASE_URI'])) {
            throw new Exception('Unable to find find AUTOTASK_API_BASE_URI env variable!');
        }

        // Now try creating the client
        $this->client = new Client(
            $_ENV['AUTOTASK_API_USERNAME'],
            $_ENV['AUTOTASK_API_SECRET'],
            $_ENV['AUTOTASK_API_INTEGRATION_CODE'],
            $_ENV['AUTOTASK_API_BASE_URI']
        );
    }
}
