<?php

namespace Core\Validator\Rules;

class ImageRule extends BaseRule
{
    public function isValid(mixed $data): bool
    {
        return str_starts_with($data['type'], 'image'); // check the mime type
    }

    public function getMessage(): string
    {
        return 'Provided file is not an image';
    }
}