<?php

namespace Anteris\Autotask\API\TicketNoteWebhooks;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents TicketNoteWebhook entities.
 */
class TicketNoteWebhookEntity extends DataTransferObject
{
    public string $deactivationUrl;
    public $id;
    public bool $isActive;
    public ?bool $isReady;
    public ?bool $isSubscribedToCreateEvents;
    public ?bool $isSubscribedToDeleteEvents;
    public ?bool $isSubscribedToUpdateEvents;
    public string $name;
    public ?string $notificationEmailAddress;
    public ?int $ownerResourceID;
    public string $secretKey;
    public bool $sendThresholdExceededNotification;
    public ?string $webhookGuid;
    public string $webhookUrl;
    /** @var \Anteris\Autotask\Support\UserDefinedFields\UserDefinedFieldEntity[]|null */
    public ?array $userDefinedFields;

    /**
     * Creates a new TicketNoteWebhook entity.
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
