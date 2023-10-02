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

    public static function findById(int $id): null|AnimeTrailer {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $reuslt = $connection->executeStatement('SELECT * FROM Anime_Trailer WHERE anime_id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return new AnimeTrailer($result);
        // todo: fetchAll rows containing anime_id == id
    }
}

