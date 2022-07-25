<?php

namespace Anteris\Autotask\API\ArticleTicketAssociations;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ArticleTicketAssociation entities.
 */
class ArticleTicketAssociationEntity extends DataTransferObject
{
    public int $articleID;
    public $id;
    public int $ticketID;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new ArticleTicketAssociation entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}
