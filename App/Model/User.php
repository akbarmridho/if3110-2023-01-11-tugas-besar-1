<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;
use DateTime;

/**
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $bio
 * @property string $role
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
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

    public static function findById(int $id): null|User
    {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $result = $connection->executeStatement('SELECT * FROM User_Data WHERE id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return new User($result);
    }
}

