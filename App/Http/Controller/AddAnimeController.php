<?php

namespace App\Http\Controller;

use App\Model\Anime;
use Core\Http\Request;
use Core\Base\BaseController;
use Core\Session\Session;
use Core\Validator\Rules\ImageRule;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Types\TimestampType;
use Core\Validator\Types\UploadedFileType;
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
            'title' => new StringType(required: true),
            'studio' => new StringType(required: false, nullable: true),
            'genre' => new StringType(required: false, nullable: true),
            'description' => new StringType(required: false, nullable: true),
            'episode_count' => new IntType(required: false, nullable: true, shouldCast: true),
            'air_date_start' => new TimestampType(required: false, nullable: true),
            'air_date_end' => new TimestampType(required: false, nullable: true),
            'poster' => new UploadedFileType(required: false, rules: [new ImageRule()])
        ]);

        if ($validated->isError()) {
            render('addanime');
        } else {


            if (array_key_exists('poster', $validated->data)) {

                if ($validated->data['poster']['name'] !== '') {
                    // handle image upload
                    $poster = $validated->data['poster'];
                    $validated->data['poster'] = move_uploaded_to_storage($poster['tmp_name'], $poster['name']);
                } else {
                    // need to check name is not empty because if empty then no image exist
                    unset($validated->data['poster']);
                }
            }

            $rowCount = Anime::create($validated->data);
            if ($rowCount == 0) {
                render('addanime', ['error' => 'Failed to add new anime']);
            } else {
                Session::setMessage('Anime added successfully');
                redirect('');
            }
        }
    }
}
