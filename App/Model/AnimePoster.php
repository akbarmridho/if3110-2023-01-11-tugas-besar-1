<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;

/**
 * @property int anime_id
 * @property string poster
 */
class AnimePoster extends Model
{
    protected array $attributes = [
        'anime_id',
        'poster'
    ];

    public static function findById(int $id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM Anime_Poster WHERE anime_id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return array_map(fn($row) => new AnimePoster($row), $result);
    }

    public static function create(int $anime_id, string $poster): int
    {
        /* execute query, insert values */
        static::$connection->executeStatement(
            "INSERT INTO anime_poster (anime_id, poster) VALUES (:anime_id, :poster)",
            ['anime_id' => $anime_id, 'poster' => $poster]
        );

        return static::$connection->rowCount();
    }

    public static function removeAll(int $anime_id): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement(
            'DELETE FROM anime_poster WHERE anime_id = :anime_id',
            ['anime_id' => $anime_id]
        );

        return static::$connection->rowCount();
    }

    public static function remove(int $anime_id, string $poster): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement(
            'DELETE FROM anime_poster WHERE anime_id = :anime_id AND poster = :poster',
            ['anime_id' => $anime_id, 'poster' => $poster]
        );

        return static::$connection->rowCount();
    }
}

