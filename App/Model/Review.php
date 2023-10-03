<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;

/**
 * @property int id
 * @property int user_id
 * @property int anime_id
 * @property string review
 * @property int rating
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Review extends Model
{
    public function __construct(array $data)
    {
        $this->attributes = array(
            'id',
            'user_id',
            'anime_id',
            'review',
            'rating',
            'created_at',
            'updated_at'
        );
        $this->data = $data;
    }

    public static function findById(int $id): null|Review {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $result = $connection->executeStatement('SELECT * FROM Review WHERE id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return new Review($result[0]);
    }

    public static function findByUserId(int $id) {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch rows */
        $result = $connection->executeStatement('SELECT * FROM Review WHERE user_id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return array_map(fn($row) => new Review($row), $result);
    }
    

    public static function findByAnimeId(int $id) {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch rows */
        $result = $connection->executeStatement('SELECT * FROM Review WHERE anime_id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return array_map(fn($row) => new Review($row), $result);
    }
    

    public static function findByUserIdAnimeId(int $user_id, int $anime_id) {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $result = $connection->executeStatement('SELECT * FROM Review WHERE anime_id = :anime_id AND user_id = :user_id', ['anime_id' => $anime_id, 'user_id' => $user_id]);
        if (empty($result))
        {
            return null;
        }

        return new Review($result[0]);
    }
}

