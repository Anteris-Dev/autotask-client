<?php

namespace Anteris\Autotask\Support\Pagination;

use Exception;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents a page when paginating results from Autotask.
 */
class PageEntity extends DataTransferObject
{
    public int $count;
    public int $requestCount;
    public ?string $prevPageUrl;
    public ?string $nextPageUrl;

    /**
     * Creates a new PageEntity from an http response.
     * 
     * @param  Response  $response  The http response to build the entity from.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): PageEntity
    {
        $array = json_decode($response->getBody(), true);

        if(! isset($array['pageDetails'])) {
            throw new Exception('Missing pageDetails key in response!');
        }

        return new static($array['pageDetails']);
    }
}
