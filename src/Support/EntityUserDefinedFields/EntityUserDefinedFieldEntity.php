<?php

namespace Anteris\Autotask\Support\EntityUserDefinedFields;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents an entity user defined field response from Autotask.
 */
class EntityUserDefinedFieldEntity extends DataTransferObject
{
    public string $name;
    public string $label;
    public string $type;
    public int $length;
    public ?string $description;
    public bool $isRequired;
    public bool $isReadOnly;
    public bool $isQueryable;
    public bool $isReference;
    public ?string $referenceEntityType;
    public bool $isPickList;
    public ?array $picklistValues;
    public ?string $picklistParentValueField;
    public string $defaultValue;
    public bool $isSupportedWebhookField;
}
