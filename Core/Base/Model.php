<?php

namespace Core\Base;

use Core\App;
use Core\Database\Connection;
use Core\Exception\ModelAttributeNotExist;

abstract class Model
{
    protected array $attributes = [];

    protected array $data = [];

    public static Connection $connection;

    public function __get(string $key): mixed
    {
        if (!array_key_exists($key, $this->data)) {
            $cls = get_class($this);
            throw new ModelAttributeNotExist("No attribute $key for $cls");
        }

        return $this->data[$key];
    }

    public function __set(string $key, mixed $value): void
    {
        if (!in_array($key, $this->attributes)) {
            $cls = get_class($this);
            throw new ModelAttributeNotExist("No attribute $key for $cls");
        }

        $this->data[$key] = $value;
    }
}