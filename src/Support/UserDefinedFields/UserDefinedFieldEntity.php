<?php

namespace Anteris\Autotask\Support\UserDefinedFields;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents a user defined field from Autotask.
 * @see UserDefinedFieldCollection
 */
class UserDefinedFieldEntity extends DataTransferObject
{
    public string $name;
    public ?string $value;
}
