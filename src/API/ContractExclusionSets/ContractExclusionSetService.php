<?php

namespace Anteris\Autotask\API\ContractExclusionSets;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractExclusionSets.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractExclusionSetsEntity.htm Autotask documentation.
 */
class ContractExclusionSetService
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
     * Creates a new contractexclusionset.
     *
     * @param  ContractExclusionSetEntity  $resource  The contractexclusionset entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractExclusionSetEntity $resource): Response
    {
        return $this->client->post("ContractExclusionSets", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ContractExclusionSet to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ContractExclusionSets/$id");
    }

    /**
     * Finds the ContractExclusionSet based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ContractExclusionSetEntity
    {
        return ContractExclusionSetEntity::fromResponse(
            $this->client->get("ContractExclusionSets/$id")
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
            $this->client->get("ContractExclusionSets/entityInformation/fields")
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
            $this->client->get("ContractExclusionSets/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractExclusionSetQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ContractExclusionSetQueryBuilder
    {
        return new ContractExclusionSetQueryBuilder($this->client);
    }

    /**
     * Updates the contractexclusionset.
     *
     * @param  ContractExclusionSetEntity  $resource  The contractexclusionset entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ContractExclusionSetEntity $resource): Response
    {
        return $this->client->put("ContractExclusionSets", $resource->toArray());
    }
}
