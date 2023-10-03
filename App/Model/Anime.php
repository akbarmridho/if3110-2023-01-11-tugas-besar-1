<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;
use DateTime;
use PDOException;

/**
 * @property int id
 * @property string title
 * @property ?string studio
 * @property ?string genre
 * @property ?string description
 * @property ?int episode_count
 * @property ?DateTime air_date_start
 * @property ?DateTime air_date_end
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Anime extends Model
{
    protected array $attributes = [
        'id',
        'title',
        'studio',
        'genre',
        'description',
        'episode_count',
        'air_date_start',
        'air_date_end',
        'created_at',
        'updated_at'
    ];

    public static $genres = [
        'Action',
        'Fantasy',
        'Comedy',
        'Sports',
        'Drama',
        'Romance',
        'Sci-Fi',
        'Slice of Life'
    ];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function findById(int $id): null|Anime
    {
        /* execute query, fetch one row */
        $result = static::$connection->executeStatement('SELECT * FROM Anime WHERE id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return new Anime($result[0]);
    }

    public static function create(array $data): int {
        /* check for null title */
        if (!array_key_exists('title', $data)) {
            return 0;
        }

        try {
            $columns = array_keys($data);
            $values = array_values($data);
    
            /* execute query, insert values */
            static::$connection->executeStatement(
                "INSERT INTO anime (" . implode(', ', $columns) . ") VALUES (" . str_repeat('?, ', count($values) - 1) . "?)",
                $values
            );
    
            return static::$connection->rowCount();
        } catch (PDOException $e) {
            /* failed query, invalid key-value pairs */
            return 0;
        }
    }

    public static function remove(int $id)
    {
        /* execute query, find and delete selected id */
        $result = static::$connection->executeStatement('DELETE FROM anime WHERE id = :id;', ['id' => $id]);

        return static::$connection->rowCount();
    }

    public static function update(int $id, array $data): int {
        try {
            $columns = array_keys($data);
            $values = array_values($data);
    
            /* execute query, insert values */
            static::$connection->executeStatement(
                "UPDATE anime SET (" . implode(', ', $columns) . ") = (" . str_repeat('?, ', count($values) - 1) . "?) WHERE id = ?",
                array_merge($values, array($id))
            );
    
            return static::$connection->rowCount();
        } catch (PDOException $e) {
            /* failed query, invalid key-value pairs */
            return 0;
        }
    }
}
