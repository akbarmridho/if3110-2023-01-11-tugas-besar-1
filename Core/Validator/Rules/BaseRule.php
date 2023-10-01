<?php

namespace Core\Validator\Rules;

abstract class BaseRule
{
    abstract public function isValid(mixed $data): bool;

    abstract public function getMessage(): string;
}