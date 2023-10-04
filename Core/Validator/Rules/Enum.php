<?php

namespace Core\Validator\Rules;

class Enum extends BaseRule
{
    public function __construct(protected array $allowedValues)
    {

    }

    public function isValid(mixed $data): bool
    {
        return in_array($data, $this->allowedValues);
    }

    public function getMessage(): string
    {
        return "Value does not in " . implode(', ', $this->allowedValues);
    }
}