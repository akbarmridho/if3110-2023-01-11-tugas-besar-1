<?php

namespace Core\Validator\Types;

use Core\Exception\ValidationException;
use Core\Validator\Rules\BaseRule;

abstract class BaseType
{
    public function __construct(public bool     $required = false,
                                public bool     $nullable = false,
                                protected array $rules = [],
                                protected bool  $shouldCast = false)
    {
        foreach ($rules as $rule) {
            if (!($rule instanceof BaseRule)) {
                throw new ValidationException("$rule is not an instance of BaseRule");
            }
        }
    }

    /** Return true if valid, else return array of error messages
     *
     * only executed when value is exist (value not exist or null is not handled here)
     * @param mixed $data
     * @return bool|array
     */
    public function isValid(mixed $data): bool|array
    {
        if ($this->shouldCast) {
            $data = $this->cast($data);
        }

        $errorMessages = [];

        foreach ($this->rules as $rule) {
            assert($rule instanceof BaseRule);

            if (!$rule->isValid($data)) {
                $errorMessages[] = $rule->getMessage();
            }
        }

        if (count($errorMessages) === 0) {
            return true;
        }

        return $errorMessages;
    }

    abstract protected function cast(mixed $data): mixed;
}