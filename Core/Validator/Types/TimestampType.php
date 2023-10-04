<?php

namespace Core\Validator\Types;

class TimestampType extends BaseType
{
    public function isValid(mixed $data): bool|array
    {
        if (!is_string($data) && !$this->shouldCast) {
            return ["Data is not a string"];
        }
        
        $data = date('Y-m-d h:i:s', strtotime($data));
        if (!date_create_from_format('Y-m-d h:i:s', $data)) {
            return ["Data is not in timestamp format"];
        }


        return parent::isValid($data);
    }

    protected function cast(mixed $data): mixed
    {
        $data = date('Y-m-d h:i:s', strtotime($data));
        return date_create_from_format('Y-m-d h:i:s', $data);
    }
}