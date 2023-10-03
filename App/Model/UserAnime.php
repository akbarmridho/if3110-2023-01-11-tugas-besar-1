<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;

/**
 * @property int user_id
 * @property int anime_id
 * @property string status
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

    public static function findByUserId(int $id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM User_Anime WHERE user_id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return array_map(fn($row) => new UserAnime($row), $result);
    }
}

