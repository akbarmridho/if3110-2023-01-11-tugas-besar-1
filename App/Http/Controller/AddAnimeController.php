<?php

namespace App\Http\Controller;

use App\Model\Anime;
use Core\Http\Request;
use Core\Base\BaseController;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Types\TimestampType;
use Core\Validator\Validator;

class AddAnimeController extends BaseController
{
    public function addAnimeView(Request $request)
    {
        render('addanime');
    }

    public function addAnime(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            'title' => new StringType(required:true),
            'studio' => new StringType(required:false, nullable:true),
            'genre' => new StringType(required:false, nullable:true),
            'description' => new StringType(required:false, nullable:true),
            'episode_count' => new IntType(required:false, nullable:true),
            'air_date_start' => new TimestampType(required:false, nullable:true),
            'air_date_end' => new TimestampType(required:false, nullable:true)
        ]);
        
        if ($validated->isError()) {
            render('addanime');
        } else {
            $rowCount = Anime::create($validated->data);
            if ($rowCount == 0) {
                render('addanime', ['error' => 'Failed to add new anime']);
            } else {
                redirect('');
            }
        }
    }
}