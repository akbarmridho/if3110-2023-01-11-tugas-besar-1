<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;
use DateTime;

/**
 * @property int id
 * @property string title
 * @property string studio
 * @property string genre
 * @property string description
 * @property int episode_count
 * @property DateTime air_date_start
 * @property DateTime air_date_end
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
}

