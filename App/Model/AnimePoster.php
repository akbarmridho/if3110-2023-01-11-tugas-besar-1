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
    public function __construct(array $data)
    {
        $this->attributes = array(
            'anime_id',
            'poster'
        );
        $this->data = $data;
    }

    public static function findById(int $id): null|AnimePoster {
        /* create a connection */
        $connection = App::get('database');
        assert($connection instanceof Connection);

        /* execute query, fetch one row */
        $statement = $connection->executeStatement('SELECT * FROM Anime_Poster WHERE anime_id = :id', ['id' => $id]);
        if (empty($result))
        {
            return null;
        }

        return new AnimePoster($result);
        // todo: fetchAll rows containing anime_id == id
    }
}

