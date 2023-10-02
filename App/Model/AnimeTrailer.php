<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;


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

    public static function findById(string $id): null|AnimeTrailer {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $statement = $connection->executeStatement('SELECT * FROM Anime_Trailer WHERE anime_id = :id', ['id' => $id]);
        if (empty($statement->fetch()))
        {
            return null;
        }

        return new AnimeTrailer($statement->fetch());
        // todo: fetchAll rows containing anime_id == id
    }
}

