<?php

namespace Anteris\Autotask\API\InternalLocationWithBusinessHours;

use Anteris\Autotask\HttpClient;
use Exception;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;

/**
 * Helps build a query to send to Autotask.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/API_Calls/REST_Basic_Query_Calls.htm Autotask documentation.
 */
class InternalLocationWithBusinessHourQueryBuilder
{
    /** @var HttpClient An HTTP client for making API requests. */
    protected HttpClient $client;

    /** @var array The filters to be applied to this query. */
    protected array $filter = [];

    /** @var int The maximum number of records to be returned. */
    protected int $records;

    private const GET_LIMIT = 1800;

    /**
     * Sets up the class to perform a query.
     * 
     * @param  HttpClient  $client  The http client to execute API requests.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(
        HttpClient $client
    )
    {
        $this->client = $client;
    }

    /**
     * Runs the query but returns an integer specifying the number of records
     * that would be returned if executed.
     */
     public function count(): int
     {
        if (strlen($this->__toString()) >= self::GET_LIMIT) {
            $response = $this->client->post("InternalLocationWithBusinessHours/query/count", $this->toArray());
        }else{
            $response = $this->client->get("InternalLocationWithBusinessHours/query/count", [
                'search' => json_encode( $this->toArray() )
            ]);
        }

         $responseArray = json_decode($response->getBody(), true);

         if (! isset($responseArray['queryCount'])) {
             throw new Exception('Missing queryCount key in response!');
         }

         return $responseArray['queryCount'];
    }

    /**
     * Pages through all the records, executing the callback for each record.
     *
     * @param  callable  $callback  The callback to be executed for each record.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function loop(callable $callback)
    {
        $currentPage = $this->paginate();

        while(True) {
            foreach ($currentPage->collection as $collectionItem) {
                $callback($collectionItem);
            }

            if (! $currentPage->hasNextPage()) {
                break;
            }

            $currentPage = $currentPage->nextPage();
        }
    }

    /**
     * Runs the query.
     */
    public function get(): InternalLocationWithBusinessHourCollection
    {
        if (strlen($this->__toString()) >= self::GET_LIMIT) {
            $response = $this->client->post("InternalLocationWithBusinessHours/query", $this->toArray());
        }else{
            $response = $this->client->get("InternalLocationWithBusinessHours/query", [
                'search' => json_encode( $this->toArray() )
            ]);
        }

        return InternalLocationWithBusinessHourCollection::fromResponse($response);
    }

    /**
     * Runs the query and returns a paginator object.
     */
    public function paginate(): InternalLocationWithBusinessHourPaginator
    {
        if (strlen($this->__toString()) >= self::GET_LIMIT) {
            $response = $this->client->post("InternalLocationWithBusinessHours/query", $this->toArray());
            return new InternalLocationWithBusinessHourPaginator($this->client, $response, $this->toArray());
        }else{
            $response = $this->client->get("InternalLocationWithBusinessHours/query", [
                'search' => json_encode( $this->toArray() )
            ]);
            return new InternalLocationWithBusinessHourPaginator($this->client, $response);
        }
    }

    /**
     * Returns the filters in this class.
     */
    public function getFilters(): array
    {
        return $this->filter;
    }

    /**
     * Sets the max number of records to be returned.
     */
    public function records(int $records)
    {
        if ($records < 1 || $records > 500) {
            throw new Exception("Cannot set records to $records, must be between 1 and 500!");
        }

        $this->records = $records;
        return $this;
    }

    /**
     * Adds a where statement to the query.
     * 
     * @param  string|callable  $field          A field name or callback query function.
     * @param  string           $operator       The operator to filter with.
     * @param  string           $value          The value the field should be compared to.
     * @param  bool             $udf            Specifies whether or not the field being queried is a UDF.
     * @param  string           $conjunction    The conjunction to filter with ('AND' or 'OR').
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function where(
        $field,
        $operator = null,
        $value = null,
        $udf = false,
        $conjuction = 'AND'
    )
    {
        // First scenario, field and non-value operator are set.
        if (
            isset($field) &&
            in_array(strtolower($operator), ['exist', 'notexist'])
        ) {
            $this->validateOperator($operator);

            $query = [
                'field' => $field,
                'op'    => $operator,
            ];

            if ($udf) {
                $query['udf'] = true;
            }

            $this->filter[] = $query;
            return $this;
        }

        // Second scenario, everything is set and legit.
        if (
            isset($field) &&
            $operator !== null &&
            $value !== null
        ) {
            $this->validateOperator($operator);

            $query = [
                'field' => $field,
                'op'    => $operator,
                'value' => $value,
            ];

            if ($udf) {
                $query['udf'] = true;
            }

            $this->filter[] = $query;
            return $this;
        }

        // Third scenario, "$field" is a callback
        if (is_callable($field)) {
            $this->validateConjunction($conjuction);

            $this->filter[] = $this->nestedWhere($conjuction, $field);
            return $this;
        }
    }

    /**
     * Adds a where statement with an 'OR' conjunction.
     * 
     * @param  string|callable  $field      A field name or callback query function.
     * @param  string           $operator   The operator to filter with.
     * @param  string           $value      The value the field should be compared to.
     * @param  bool             $udf        Specifies whether or not the field being queried is a UDF.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function orWhere($field, $operator = null, $value = null, $udf = false)
    {
        return $this->where($field, $operator, $value, $udf, 'OR');
    }

    /**
     * Returns the query as an array.
     */
    public function toArray(): array
    {
        $array = [
            'filter' => $this->filter,
        ];

        if (isset($this->records)) {
            $array['MaxRecords'] = $this->records;
        }

        return $array;
    }

    /**
     * Converts a callback where statement into a nested query.
     * 
     * @param  string   $conjuction The conjunction to join these items with (AND or OR).
     * @param  callable $callback   The callback query to be executed.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com> 
     */
    protected function nestedWhere(string $conjunction, callable $callback)
    {
        return [
            'op'    => $conjunction,
            'items' => $callback( new static($this->client) )->getFilters()
        ];
    }

    /**
     * Ensures the conjunction being used is valid.
     * 
     * @param  string  $conjuction  The conjunction to validate.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    protected function validateConjunction(string $conjunction)
    {
        if (strtoupper($conjunction) != 'AND' && strtoupper($conjunction) != 'OR') {
            throw new Exception("Invalid query conjunction: $conjunction");
        }
    }

    /**
     * Ensures the operator being used is valid.
     *
     * @param  string  $operator  The operator to validate.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    protected function validateOperator(string $operator)
    {
        if (
            !in_array($operator, [
                'eq',
                'noteq',
                'gt',
                'gte',
                'lt',
                'lte',
                'in',
                'notIn',
                'exist',
                'notExist',
                'beginsWith',
                'endsWith',
                'contains',
            ])
        ) {
            throw new Exception("Invalid query operator: $operator");
        }
    }

    /**
     * Converts the built query into a string and returns.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __toString()
    {
        $uri = UriResolver::resolve(
            $this->client->getClient()->getConfig()['base_uri'],
            new Uri('InternalLocationWithBusinessHours/query')
        );

        return (string) Uri::withQueryValues($uri, [
            'search' => json_encode($this->toArray())
        ]);
    }
}
