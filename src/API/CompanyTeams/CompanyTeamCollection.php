<?php

namespace Anteris\Autotask\API\CompanyTeams;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;

/**
 * Contains a collection of CompanyTeam entities.
 * @see CompanyTeamEntity
 */
class CompanyTeamCollection extends Collection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): CompanyTeamEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): CompanyTeamEntity
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
    public static function fromResponse(Response $response): CompanyTeamCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            CompanyTeamEntity::arrayOf($array['items'])
        );
    }
}
