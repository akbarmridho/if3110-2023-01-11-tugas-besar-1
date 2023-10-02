<?php

namespace Core\Validator\Rules;

class Min extends BaseRule
{
    public function __construct(protected int $length)
    {
    }

    public function isValid(mixed $data): bool
    {
        return count($data) >= $this->length;
    }

    public function getMessage(): string
    {
        return "Length of data minimum $this->length";
    }
}