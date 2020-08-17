<?php

namespace Anteris\Autotask\API\ResourceSkills;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ResourceSkills.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourceSkillsEntity.htm Autotask documentation.
 */
class ResourceSkillService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the ResourceSkill based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ResourceSkillEntity
    {
        return ResourceSkillEntity::fromResponse(
            $this->client->get("ResourceSkills/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ResourceSkillQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ResourceSkillQueryBuilder
    {
        return new ResourceSkillQueryBuilder($this->client);
    }

    /**
     * Updates the resourceskill.
     *
     * @param  ResourceSkillEntity  $resource  The resourceskill entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ResourceSkillEntity $resource): void
    {
        $this->client->put("ResourceSkills/$resource->id", $resource->toArray());
    }
}