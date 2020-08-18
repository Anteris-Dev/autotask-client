<?php

namespace Anteris\Autotask\API\ContactWebhooks;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ContactWebhook entities.
 */
class ContactWebhookEntity extends DataTransferObject
{
    public string $deactivationUrl;
    public int $id;
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
    public ?string $webhookGUID;
    public string $webhookUrl;
    public array $userDefinedFields = [];

    /**
     * Creates a new ContactWebhook entity.
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
