<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;
use DateTime;

/**
 * @property int id
 * @property int user_id
 * @property string username
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
            'username',
            'anime_id',
            'review',
            'rating',
            'created_at',
            'updated_at'
        );
        $this->data = $data;
    }

    public static function findById(int $id): null|Review
    {
        /* execute query, fetch one row */
        $result = static::$connection->executeStatement('SELECT * FROM Review NATURAL JOIN (SELECT id as user_id, username FROM user_data) ud WHERE id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return new Review($result[0]);
    }

    public static function findByUserId(int $id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM Review NATURAL JOIN (SELECT id as user_id, username FROM user_data) ud WHERE user_id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return array_map(fn($row) => new Review($row), $result);
    }


    public static function findByAnimeId(int $id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM Review NATURAL JOIN (SELECT id as user_id, username FROM user_data) ud WHERE anime_id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return array_map(fn($row) => new Review($row), $result);
    }


    public static function findByUserIdAnimeId(int $user_id, int $anime_id)
    {
        /* execute query, fetch one row */
        $result = static::$connection->executeStatement('SELECT * FROM Review NATURAL JOIN (SELECT id as user_id, username FROM user_data) ud WHERE anime_id = :anime_id AND user_id = :user_id', ['anime_id' => $anime_id, 'user_id' => $user_id]);
        if (empty($result)) {
            return null;
        }

        return new Review($result[0]);
    }

    public static function create(array $data): int 
    {
        $columns = array_keys($data);
        $values = array_values($data);

        /* execute query, insert values */
        static::$connection->executeStatement(
            "INSERT INTO review (" . implode(', ', $columns) . ") VALUES (" . str_repeat('?, ', count($values) - 1) . "?)",
            $values
        );

        return static::$connection->rowCount();
    }

    public static function remove(int $id): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement('DELETE FROM review WHERE id = :id;', ['id' => $id]);

        return static::$connection->rowCount();
    }

    public static function update(int $id, array $data): int 
    {
        $columns = array_keys($data);
        $values = array_values($data);

        /* update values */
        $update_set = '';
        foreach ($columns as $col) {
            $update_set .= "$col = ?, ";
        }
        $update_set = substr($update_set, 0, -2);

        /* execute query, update values */
        static::$connection->executeStatement(
            "UPDATE review SET $update_set WHERE id = ?",
            array_merge($values, array($id))
        );

        return static::$connection->rowCount();
    }
}

