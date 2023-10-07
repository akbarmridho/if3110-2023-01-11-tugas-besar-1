<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;

/**
 * @property int anime_id
 * @property string trailer
 */
class AnimeTrailer extends Model
{
    protected array $attributes = [
        'anime_id',
        'trailer'
    ];

    public static function findById(int $id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM Anime_Trailer WHERE anime_id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return array_map(fn($row) => new AnimeTrailer($row), $result);
    }

    public static function create(int $anime_id, string $trailer): int
    {
        /* execute query, insert values */
        static::$connection->executeStatement(
            "INSERT INTO anime_trailer (anime_id, trailer) VALUES (:anime_id, :trailer)",
            ['anime_id' => $anime_id, 'trailer' => $trailer]
        );

        return static::$connection->rowCount();
    }

    public static function removeAll(int $anime_id): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement(
            'DELETE FROM anime_trailer WHERE anime_id = :anime_id',
            ['anime_id' => $anime_id]
        );

        return static::$connection->rowCount();
    }

    public static function remove(int $anime_id, string $trailer): int
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement(
            'DELETE FROM anime_trailer WHERE anime_id = :anime_id AND trailer = :trailer',
            ['anime_id' => $anime_id, 'trailer' => $trailer]
        );

        return static::$connection->rowCount();
    }
}

