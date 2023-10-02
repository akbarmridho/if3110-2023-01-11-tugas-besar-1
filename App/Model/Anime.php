<?php

namespace App\Model;

use Core\Base\Model;
use Core\App;
use Core\Database\Connection;

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

    public static function findById(int $id): null|Anime {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $result = $connection->executeStatement('SELECT * FROM Anime WHERE id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return new Anime($result);
    }
}

