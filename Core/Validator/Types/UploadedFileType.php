<?php

namespace Core\Validator\Types;

class UploadedFileType extends BaseType
{
    public function isValid(mixed &$data): bool|array
    {
        if (!is_array($data)) {
            return ['Supplied data is not a valid filetype'];
        }

        $valid = true;
        $keyToCheck = ['name', 'type', 'tmp_name'];

        foreach ($keyToCheck as $key) {
            if (!array_key_exists($key, $data)) {
                $valid = false;
                break;
            }
        }

        if (!$valid) {
            return ['Supplied data is not a valid filetype'];
        }

        // empty
        if (!$this->required && $data['name'] === '') {
            return true;
        }

        return parent::isValid($data);
    }

    protected function cast(mixed $data): mixed
    {
        throw new \Exception('Uploaded file type is not castable');
    }
}