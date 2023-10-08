<?php

namespace App\Http\Controller;

use App\Model\Anime;
use Core\Http\Request;
use Core\Base\BaseController;
use Core\Session\Session;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Types\TimestampType;
use Core\Validator\Validator;

class EditAnimeController extends BaseController
{
    public function editAnimeView(Request $request)
    {
        render('editanime', ['anime' => Anime::findById($request->getRouteParam('id'))]);
    }

    public function editAnime(Request $request)
    {

        $validated = Validator::validate($request->getFormData(), [
            'title' => new StringType(required: true),
            'studio' => new StringType(required: false, nullable: true),
            'genre' => new StringType(required: false, nullable: true),
            'description' => new StringType(required: false, nullable: true),
            'episode_count' => new IntType(required: false, nullable: true, shouldCast: true),
            'air_date_start' => new TimestampType(required: false, nullable: true),
            'air_date_end' => new TimestampType(required: false, nullable: true)
        ]);

        if ($validated->isError()) {
            render('editanime', ['anime' => Anime::findById($request->getRouteParam('id'))]);
        } else {
            $rowCount = Anime::update($request->getRouteParam('id'), $validated->data);
            if ($rowCount == 0) {
                render('editanime', ['error' => 'Failed to add new anime']);
            } else {
                Session::setMessage('Anime updated');
                redirect('/anime/' . $request->getRouteParam('id'));
            }
        }
    }

    public function deleteAnime(Request $request)
    {
        $id = (int)$request->getRouteParam('id');
        Anime::delete($id);

        Session::setMessage('Anime deleted successfully');
    }
}