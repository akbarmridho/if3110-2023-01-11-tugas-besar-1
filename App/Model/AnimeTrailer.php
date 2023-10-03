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
    public function __construct(array $data)
    {
        $this->attributes = array(
            'anime_id',
            'trailer'
        );
        $this->data = $data;
    }

    public static function findById(int $id)
    {
        /* execute query, fetch rows */
        $result = static::$connection->executeStatement('SELECT * FROM Anime_Trailer WHERE anime_id = :id', ['id' => $id]);
        if (empty($result)) {
            return null;
        }

        return array_map(fn($row) => new AnimeTrailer($row), $result);
    }
}

