<?php

namespace Anteris\Autotask\API\OpportunityAttachments;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents OpportunityAttachment entities.
 */
class OpportunityAttachmentEntity extends DataTransferObject
{
    public ?Carbon $attachDate;
    public $attachedByContactID;
    public $attachedByResourceID;
    public string $attachmentType;
    public ?string $contentType;
    public ?int $creatorType;
    public $data;
    public $fileSize;
    public string $fullPath;
    public $id;
    public ?int $impersonatorCreatorResourceID;
    public $opportunityID;
    public ?int $parentAttachmentID;
    public $parentID;
    public int $publish;
    public string $title;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new OpportunityAttachment entity.
     * If this entity has dates, they will be cast as Carbon objects.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(array $array)
    {
        if (isset($array['attachDate'])) {
            $array['attachDate'] = new Carbon($array['attachDate']);
        }

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
