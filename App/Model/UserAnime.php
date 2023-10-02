<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;

/**
 * @property int user_id
 * @property int anime_id
 * @property enum status
 */
class UserAnime extends Model
{
    public function __construct(array $data)
    {
        $this->attributes = array(
            'user_id',
            'anime_id',
            'status'
        );
        $this->data = $data;
    }

    public static function findByUserId(int $id) {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch rows */
        $result = $connection->executeStatement('SELECT * FROM User_Anime WHERE user_id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return array_map(fn($row) => new UserAnime($row), $result);
    }
}

