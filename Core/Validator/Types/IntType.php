<?php

namespace Core\Validator\Types;

class IntType extends BaseType
{
    public function isValid(mixed $data): bool|array
    {
        if (!is_int($data) && !$this->shouldCast) {
            return ["Data is not an integer"];
        }

        return parent::isValid($data);
    }

    protected function cast(mixed $data): mixed
    {
        return intval($data);
    }
}