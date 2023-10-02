<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;


class Anime extends Model
{
    public function __construct(array $data)
    {
        $this->attributes = array(
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
        );
        $this->data = $data;
    }

    public static function findById(string $id): null|Anime {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $statement = $connection->executeStatement('SELECT * FROM Anime WHERE id = :id', ['id' => $id]);
        if (empty($statement->fetch()))
        {
            return null;
        }

        return new Anime($statement->fetch());
    }
}

