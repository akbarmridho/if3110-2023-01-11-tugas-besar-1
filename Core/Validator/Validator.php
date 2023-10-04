<?php

namespace Core\Validator;

use Core\Exception\ValidationException;
use Core\Validator\Types\BaseType;

class Validator
{
    public static function validate(array $data, array $rules): Validator
    {
        $errorMessages = [];
        $validatedData = [];

        foreach ($rules as $key => $rule) {
            if (!($rule instanceof BaseType)) {
                throw new ValidationException("$rule is not an instance of BaseType");
            }

            if (!array_key_exists($key, $data) && $rule->required) {
                $errorMessages[$key] = ["Property $key is required"];
            } else if (array_key_exists($key, $data)) {
                $propertyData = $data[$key];

                if ($rule->nullable && empty($propertyData)) {
                    $validatedData[$key] = null;
                } else if (!$rule->nullable && empty($propertyData)) {
                    $errorMessages[$key] = ["Property $key is not nullable"];
                } else {
                    $result = $rule->isValid($propertyData);

                    if (is_bool($result)) {
                        assert($result === true);

                        $validatedData[$key] = $propertyData;
                    } else {
                        $errorMessages[$key] = $result;
                    }
                }
            }
        }

        return new static($validatedData, $errorMessages);
    }

    public function __construct(public array $data, public array $errorMessages)
    {

    }

    public function isError(): bool
    {
        return !empty($this->errorMessages);
    }
}