<?php

namespace Core\Validator\Types;

class StringType extends BaseType
{
    public function isValid(mixed $data): bool|array
    {
        if (!is_string($data)) {
            return ["Data is not a string"];
        }

        return parent::isValid($data);
    }
}