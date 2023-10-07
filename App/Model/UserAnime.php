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
    protected array $attributes = [
        'user_id',
        'anime_id',
        'status'
    ];

    public static function findByUserId(int $id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM User_Anime WHERE user_id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return array_map(fn($row) => new UserAnime($row), $result);
    }

    public static function findByUserIdAnimeId(int $user_id, int $anime_id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM User_Anime WHERE user_id = :user_id AND anime_id = :anime_id', ['user_id' => $user_id, 'anime_id' => $anime_id]);
        if (empty($result)) {
            return null;
        }

        return new UserAnime($result[0]);
    }

    public static function create(int $user_id, int $anime_id, string $status = 'WISHLIST'): int
    {
        /* execute query, insert values */
        static::$connection->executeStatement(
            "INSERT INTO user_anime (user_id, anime_id, status) VALUES (:user_id, :anime_id, :status)",
            ['user_id' => $user_id, 'anime_id' => $anime_id, 'status' => $status]
        );

        return static::$connection->rowCount();
    }

    public static function remove(int $user_id, int $anime_id): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement(
            'DELETE FROM user_anime WHERE user_id = :user_id AND anime_id = :anime_id',
            ['user_id' => $user_id, 'anime_id' => $anime_id]
        );

        return static::$connection->rowCount();
    }

    public static function updateStatus(int $user_id, int $anime_id, string $status): int
    {
        /* execute query, insert values */
        static::$connection->executeStatement(
            "UPDATE user_anime SET status = :status WHERE user_id = :user_id AND anime_id = :anime_id",
            ['user_id' => $user_id, 'anime_id' => $anime_id, 'status' => $status]
        );

        return static::$connection->rowCount();
    }
}

