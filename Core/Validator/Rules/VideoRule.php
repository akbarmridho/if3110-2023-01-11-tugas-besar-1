<?php

namespace Core\Validator\Rules;

class VideoRule extends BaseRule
{
    public function isValid(mixed $data): bool
    {
        return str_starts_with($data['type'], 'video'); // check the mime type
    }

    public function getMessage(): string
    {
        return 'Provided file is not a video';
    }
}