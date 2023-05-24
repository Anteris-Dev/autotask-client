<?php

namespace Anteris\Autotask\API\HolidaySets;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask HolidaySets.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/HolidaySetsEntity.htm Autotask documentation.
 */
class HolidaySetService
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
     * Creates a new holidayset.
     *
     * @param  HolidaySetEntity  $resource  The holidayset entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(HolidaySetEntity $resource): Response
    {
        return $this->client->post("HolidaySets", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the HolidaySet to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("HolidaySets/$id");
    }

    /**
     * Finds the HolidaySet based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): HolidaySetEntity
    {
        return HolidaySetEntity::fromResponse(
            $this->client->get("HolidaySets/$id")
        );
    }

    /**
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("HolidaySets/entityInformation/fields")
        );
    }

    /**
     * Returns information about what actions can be made against an entity.
     *
     * @see EntityInformationEntity
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityInformation(): EntityInformationEntity
    {
        return EntityInformationEntity::fromResponse(
            $this->client->get("HolidaySets/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see HolidaySetQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): HolidaySetQueryBuilder
    {
        return new HolidaySetQueryBuilder($this->client);
    }

    /**
     * Updates the holidayset.
     *
     * @param  HolidaySetEntity  $resource  The holidayset entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(HolidaySetEntity $resource): Response
    {
        return $this->client->put("HolidaySets", $resource->toArray());
    }
}
