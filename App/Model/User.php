<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;


class User extends Model
{
    public function __construct(array $data)
    {
        $this->attributes = array(
            'id',
            'name',
            'username',
            'password',
            'bio',
            'role',
            'created_at',
            'updated_at'
        );
        $this->data = $data;
    }

    public static function findById(string $id): null|User {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $statement = $connection->executeStatement('SELECT * FROM User_Data WHERE id = :id', ['id' => $id]);
        if (empty($statement->fetch()))
        {
            return null;
        }

        return new User($statement->fetch());
        // todo: test connection
    }
}

