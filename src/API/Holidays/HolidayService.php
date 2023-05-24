<?php

namespace Anteris\Autotask\API\Holidays;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Holidays.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/HolidaysEntity.htm Autotask documentation.
 */
class HolidayService
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
     * Creates a new holiday.
     *
     * @param  HolidayEntity  $resource  The holiday entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(HolidayEntity $resource): Response
    {
        $holidaySetID = $resource->holidaySetID;
        return $this->client->post("HolidaySets/$holidaySetID/Holidays", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $holidaySetID  ID of the Holiday parent resource.
     * @param  int  $id  ID of the Holiday to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $holidaySetID,int $id): void
    {
        $this->client->delete("HolidaySets/$holidaySetID/Holidays/$id");
    }

    /**
     * Finds the Holiday based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): HolidayEntity
    {
        return HolidayEntity::fromResponse(
            $this->client->get("Holidays/$id")
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
            $this->client->get("Holidays/entityInformation/fields")
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
            $this->client->get("Holidays/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see HolidayQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): HolidayQueryBuilder
    {
        return new HolidayQueryBuilder($this->client);
    }

    /**
     * Updates the holiday.
     *
     * @param  HolidayEntity  $resource  The holiday entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(HolidayEntity $resource): Response
    {
        $holidaySetID = $resource->holidaySetID;
        return $this->client->put("HolidaySets/$holidaySetID/Holidays", $resource->toArray());
    }
}
